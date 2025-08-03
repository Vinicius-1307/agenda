<?php

namespace App\Services;

use App\Models\AccessLevel;
use App\Models\AccessLevelScreen;
use Illuminate\Support\Facades\DB;

class AccessLevelService
{
    public function getAll(): array
    {
        return AccessLevel::query()
            ->orderBy('name')
            ->get()
            ->mapWithKeys(function ($accessLevel) {
                return [$accessLevel->id => $accessLevel->name];
            })
            ->toArray();
    }

    public function create(array $data): void
    {
        try {
            DB::transaction(function () use ($data) {
                $accessLevel = AccessLevel::updateOrCreate(
                    [
                        'id' => data_get($data, 'id'),
                    ],
                    [
                        'name' => data_get($data, 'name'),
                        'description' => data_get($data, 'desc'),
                    ]
                );

                $this->createAcessLevelScreens(data_get($accessLevel, 'id'), data_get($data, 'screens'));
            });
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    public function createAcessLevelScreens(int $accessLevelId, array $screens)
    {
        try {
            $accessLevel = AccessLevel::findOrFail($accessLevelId);
            $accessLevel->screens()->sync($screens);
        } catch (\Exception $ex) {
            throw $ex;
        }
    }
}
