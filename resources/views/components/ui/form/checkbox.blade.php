@props([
    'name',
    'label',
    'checked' => false,
])

<div class="mb-4">
    <label class="inline-flex items-center gap-2 text-sm font-medium text-navy-900">
        <input
            type="checkbox"
            name="{{ $name }}"
            value="1"
            @checked(old($name, $checked))
            {{ $attributes->merge(['class' => 'rounded border-slate-300 text-navy-700 focus:ring-navy-600']) }}
        >
        {{ $label }}
    </label>
    @error($name)
        <span class="block mt-2 text-sm text-red-600">{{ $message }}</span>
    @enderror
</div>
