@props([
    'options' => [],
    'disabled' => false,
    'value' => null,
])

<select @disabled($disabled)
    {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) }}>
    <option value="" disabled selected>Selecione uma opção</option>
    @foreach ($options as $key => $label)
        <option value="{{ $key }}"
            {{ (string) old($attributes->get('name'), $value) === (string) $key ? 'selected' : '' }}>
            {{ $label }}
        </option>
    @endforeach
</select>
