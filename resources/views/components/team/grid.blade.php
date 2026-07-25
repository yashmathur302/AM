@props([
    'members',
    'heading' => null,
    'showBio' => false,
    'showLinkedin' => false,
    'bioLimit' => null,
])

@if ($members->isNotEmpty())
    <div>
        @if ($heading)
            <h2 class="mb-10">{{ $heading }}</h2>
        @endif
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($members as $member)
                <x-ui.card>
                    <x-slot:media>
                        @if ($member->photo_url)
                            <img class="aspect-[16/10] object-cover" src="{{ $member->photo_url }}" alt="{{ $member->name }}" loading="lazy" width="400" height="250">
                        @endif
                    </x-slot:media>
                    <h3 class="text-lg font-heading font-bold text-navy-900">{{ $member->name }}</h3>
                    <p class="text-xs text-slate-500">{{ $member->role }}</p>
                    @if ($showBio && $member->bio)
                        <p class="text-sm text-slate-600">{{ $bioLimit ? Str::limit($member->bio, $bioLimit) : $member->bio }}</p>
                    @endif
                    @if ($showLinkedin && $member->linkedin_url)
                        <a class="mt-auto font-semibold text-navy-700 hover:text-gold-600" href="{{ $member->linkedin_url }}" target="_blank" rel="noopener noreferrer">LinkedIn &rarr;</a>
                    @endif
                </x-ui.card>
            @endforeach
        </div>
    </div>
@endif
