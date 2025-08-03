  <div>
      <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
              {{ __('Nível de Acesso') }}
          </h2>
      </x-slot>

      <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
              <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                  <div class="flex flex-col gap-8">
                      <div class="flex items-center w-full gap-4">
                          <div class="w-1/3">
                              <x-input-label for="name" :value="__('Nome')" :required="true" />
                              <x-text-input wire:model="name" id="name" name="name" type="text"
                                  class="mt-1 block w-full" required autofocus autocomplete="name" />
                              <x-input-error class="mt-2" :messages="$errors->get('name')" />
                          </div>
                          <div class="w-2/3">
                              <x-input-label for="description" :value="__('Descrição')" :required="true" />
                              <x-text-input wire:model="description" id="description" name="description" type="text"
                                  class="mt-1 block w-full" required autofocus autocomplete="description" />
                              <x-input-error class="mt-2" :messages="$errors->get('description')" />
                          </div>
                      </div>
                      <div>
                          <x-input-label value="Permissões de Telas" class="mb-2" />

                          <div
                              class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 max-h-[400px] overflow-y-auto border p-4 rounded-md">
                              @foreach ($this->screens() as $screen)
                                  <label class="flex items-center space-x-2">
                                      <input type="checkbox" value="{{ data_get($screen, 'id') }}"
                                          wire:model="selectedScreens"
                                          class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" />
                                      <span class="text-sm text-gray-800 dark:text-gray-200">
                                          {{ data_get($screen, 'name') }}
                                      </span>
                                  </label>
                              @endforeach
                          </div>
                          <x-input-error :messages="$errors->get('selectedScreens.*')" class="mt-2" />
                      </div>
                      <div class="flex justify-end items-center gap-4">
                          <x-primary-button wire:click="save()">{{ __('Salvar') }}</x-primary-button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
