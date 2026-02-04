<div x-show="tabOpen === 'details'" class="text-primary-300">
    @if ($isTv && isset($video->next_episode_to_air['air_date']))
        <p class="text-primary-400 uppercase mb-1">{{ __('Upcoming Episode') }}</p>
        <p class="mb-4">{{ $video->next_episode_to_air['name'] ?? 'Episode' }}
            ({{ countdown($video->next_episode_to_air['air_date']) }})</p>
    @endif
    <p class="text-primary-400 uppercase mb-1">{{ __('Release Date') }}</p>
    <p class="text-primary-300 text-sm">
        {{ carbon(strval($isTv ? $video->first_air_date : $video->release_date))->format('d M, Y') }}
    </p>
    @isset($runtime)
        <p class="text-primary-400 uppercase mt-4 mb-1">{{ __('Runtime') }}</p>
        <p>{{ sprintf('%02d:%02d:', floor($runtime / 60), $runtime - floor($runtime / 60) * 60) }} <small
                class="text-primary-400">(HH:MM)</small></p>
    @endisset
    @if ($isTv && isset($video->number_of_episodes))
        <p class="text-primary-400 uppercase mt-4 mb-1">{{ __('Total Episode/Season') }}</p>
        <p>{{ $video->number_of_episodes }}/{{ $video->number_of_seasons ?? 0 }}</p>
    @endif
    <p class="text-primary-400 uppercase mt-4 mb-1">{{ __('Synopsis') }}</p>
    <h3 class="text-xl font-semibold mb-2 text-primary-200">{{ $video->tagline }}</h3>
    <p>{{ $video->overview }}</p>
    @if ($title != $original_title)
        <p class="text-primary-400 uppercase mt-4 mb-1">{{ __('Original Title') }}</p>
        <p>{{ $original_title }}</p>
    @endif
    @include('includes.video.parts.gallery')
</div>
