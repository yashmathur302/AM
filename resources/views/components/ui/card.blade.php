@props(['media' => null])

<div {{ $attributes->merge(['class' => 'flex flex-col bg-white rounded-lg shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-200 overflow-hidden']) }}>
    @isset($media)
        {{ $media }}
    @endisset

    <div class="flex flex-col gap-2 p-4 flex-1">
        {{ $slot }}
    </div>
</div>
