@props([
    'name',
    'label',
    'accept' => 'image/png,image/jpeg,image/webp',
    'preview' => null,
])

<div class="mb-4">
    <label for="{{ $name }}" class="block mb-2 text-sm font-semibold text-navy-900">{{ $label }}</label>
    <input
        type="file"
        id="{{ $name }}"
        name="{{ $name }}"
        accept="{{ $accept }}"
        {{ $attributes->merge(['class' => 'block w-full rounded border px-3 py-2 text-slate-800 border-slate-300 '.($errors->has($name) ? 'border-red-500' : '')]) }}
    >
    @if ($preview)
        <img src="{{ $preview }}" alt="" width="160" class="mt-2 rounded">
    @endif
    @error($name)
        <span class="block mt-2 text-sm text-red-600">{{ $message }}</span>
    @enderror
</div>
