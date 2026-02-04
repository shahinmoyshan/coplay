<div x-show="tabOpen === 'people'" x-cloak class="text-primary-300">
    @if (isset($video->created_by) && !empty($video->created_by))
        <p class="text-primary-400 uppercase mb-1">{{ __('Created By') }}</p>
        <div class="grid grid-cols-3 sm:grid-cols-5 mb-4 lg:grid-cols-6 xl:grid-cols-7 gap-4">
            @foreach ($video->created_by as $creator)
                <x-people :person="$creator" />
            @endforeach
        </div>
    @endif
    <p class="text-primary-400 uppercase mb-1">{{ __('Actors') }}</p>
    <div class="grid grid-cols-3 sm:grid-cols-5 lg:grid-cols-6 xl:grid-cols-7 gap-4">
        @foreach (array_slice($video->credits['cast'] ?? [], 0, 21) as $cast)
            <x-people :person="$cast" />
        @endforeach
    </div>
    @if (isset($video->credits['crew']) && !empty($video->credits['crew']))
        <p class="text-primary-400 uppercase mt-4 mb-1">{{ __('Crew') }}</p>
        <div class="grid grid-cols-3 sm:grid-cols-5 lg:grid-cols-6 xl:grid-cols-7 gap-4">
            @foreach (array_slice($video->credits['crew'] ?? [], 0, 14) as $crew)
                <x-people :person="$crew" />
            @endforeach
        </div>
    @endif
</div>
