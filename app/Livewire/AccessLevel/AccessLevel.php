<?php

namespace App\Livewire\AccessLevel;

use App\Models\Screen;
use App\Services\AccessLevelService;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

class AccessLevel extends Component
{
    public array $selectedScreens = [];
    public ?int $id = null;
    public ?string $name = '';
    public ?string $description = '';

    #[Computed]
    public function screens()
    {
        return Screen::all();
    }

    public function save()
    {
        try {
            $this->validate(
                [
                    'name' => 'required|string|unique:access_levels,name',
                    'description' => 'required|string',
                    'selectedScreens' => 'required|array|min:1',
                ],
                [
                    'name.unique' => 'Já existe um nível de acesso com este nome.',
                    'name.required' => 'O campo nome é obrigatório.',
                    'description.required' => 'O campo descrição é obrigatório.',
                    'selectedScreens.required' => 'Você deve selecionar ao menos uma permissão.',
                    'selectedScreens.min' => 'Você deve selecionar ao menos uma permissão.',
                ]
            );

            (new AccessLevelService())->create($this->mountObject());

            $this->dispatch('notificacao', ['position' => 'top-right', 'title' => 'Nível de Acesso criado.', 'type' => 'success']);

            $this->reset();
        } catch (\Exception $e) {
            $this->dispatch('notificacao', ['position' => 'top-right', 'title' => $e->getMessage(), 'type' => 'danger']);
        }
    }

    private function mountObject(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'desc' => $this->description,
            'screens' => $this->selectedScreens,
        ];
    }

    public function render(): View
    {
        return view('livewire.access-level.access-level');
    }
}
