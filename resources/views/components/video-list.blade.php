@use('Spark\Support\Str')
@props(['video', 'key' => null])

@php
    $isTv = isset($video->name) && !isset($video->title);
    if ($isTv) {
        $slug = home_url('/tv/' . Str::slug($video->name) . '-' . $video->id);
    } else {
        $slug = home_url('/movie/' . Str::slug($video->title) . '-' . $video->id);
    }
@endphp

<div class="flex group text-primary-400 mt-2">
    <a href="{{ $slug }}" class="w-32 sm:w-36 md:w-40">
        @if (isset($video->poster_path) && !empty($video->poster_path))
            <img src="{{ $video->getImageUrl('w154') . $video->poster_path }}" alt="poster"
                class="group-hover:opacity-75 rounded-md w-full object-cover transition ease-in-out duration-150">
        @else
            <div class="text-primary-400 opacity-25">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10/12" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M20 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zm.001 6c-.001 0-.001 0 0 0h-.466l-2.667-4H20l.001 4zm-5.466 0-2.667-4h2.596l2.667 4h-2.596zm-2.404 0H9.535L6.869 5h2.596l2.666 4zM4 5h.465l2.667 4H4V5z">
                    </path>
                </svg>
            </div>
        @endif
    </a>
    <div class="w-full px-4 flex flex-col justify-between text-sm">
        <div>
            <a href="{{ $slug }}"
                class="flex items-start text-primary-200 font-semibold">{{ $isTv ? $video->name : $video->title }}</a>
            <span
                class="text-primary-400 block my-0.5">{{ carbon(strval($isTv ? $video->first_air_date : $video->release_date))->format('d M, Y') }}</span>
            <p class="text-xs">
                {!! $video->genres(
                    fn($genres) => join(
                        ', ',
                        array_map(
                            fn($id, $title) => sprintf(
                                '<a class="hover:text-accent-500" href="%s">%s</a>',
                                route_url('genre', [
                                    'type' => $isTv ? 'tv' : 'movie',
                                    'slug' => Str::slug($title ?? '') . '-' . $id,
                                ]),
                                $title,
                            ),
                            array_keys($genres),
                            array_values($genres),
                        ),
                    ),
                ) !!}
            </p>
        </div>
        @isset($key)
            <span class="text-primary-400 text-2xl font-light mr-1">{{ $key }}</span>
        @endisset
    </div>
</div>
