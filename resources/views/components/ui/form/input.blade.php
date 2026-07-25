@props([
    'name',
    'label',
    'type' => 'text',
    'value' => null,
    'required' => false,
    'hint' => null,
])

<div class="mb-4">
    <label for="{{ $name }}" class="block mb-2 text-sm font-semibold text-navy-900">{{ $label }}</label>
    <input
        type="{{ $type }}"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        @if ($required) required @endif
        {{ $attributes->merge(['class' => 'block w-full rounded border px-3 py-3 text-slate-800 border-slate-300 focus:border-navy-600 focus:ring-3 focus:ring-navy-600/15 focus:outline-none '.($errors->has($name) ? 'border-red-500' : '')]) }}
    >
    @if ($hint)
        <span class="block mt-2 text-xs text-slate-500">{{ $hint }}</span>
    @endif
    @error($name)
        <span class="block mt-2 text-sm text-red-600">{{ $message }}</span>
    @enderror
</div>
