@php
    $title = $info['name'] . ': ' . cms('title') . ' - ' . cms('tagline');
@endphp

@section('title', $title)

@extends('layout.master')

@section('content')
    <main class="container my-8">
        <div class="flex flex-col mb-8 md:flex-row items-center md:items-start text-center md:text-left">
            @isset($info['profile_path'])
                <div class="flex-none">
                    <img src="https://image.tmdb.org/t/p/w300/{{ $info['profile_path'] }}" alt="profile image"
                        class="w-60 rounded-md">
                </div>
            @endisset
            <div class="{{ isset($info['profile_path']) ? 'md:ml-8' : '' }}">
                <h2 class="text-4xl mt-4 md:mt-0 font-semibold mb-2">{{ $info['name'] }}</h2>
                <div class="flex flex-wrap items-center justify-center md:justify-start text-primary-400 text-sm">
                    <svg class="fill-current text-primary-400 hover:text-primary-50 w-4" viewBox="0 0 448 512">
                        <path
                            d="M448 384c-28.02 0-31.26-32-74.5-32-43.43 0-46.825 32-74.75 32-27.695 0-31.454-32-74.75-32-42.842 0-47.218 32-74.5 32-28.148 0-31.202-32-74.75-32-43.547 0-46.653 32-74.75 32v-80c0-26.5 21.5-48 48-48h16V112h64v144h64V112h64v144h64V112h64v144h16c26.5 0 48 21.5 48 48v80zm0 128H0v-96c43.356 0 46.767-32 74.75-32 27.951 0 31.253 32 74.75 32 42.843 0 47.217-32 74.5-32 28.148 0 31.201 32 74.75 32 43.357 0 46.767-32 74.75-32 27.488 0 31.252 32 74.5 32v96zM96 96c-17.75 0-32-14.25-32-32 0-31 32-23 32-64 12 0 32 29.5 32 56s-14.25 40-32 40zm128 0c-17.75 0-32-14.25-32-32 0-31 32-23 32-64 12 0 32 29.5 32 56s-14.25 40-32 40zm128 0c-17.75 0-32-14.25-32-32 0-31 32-23 32-64 12 0 32 29.5 32 56s-14.25 40-32 40z">
                        </path>
                    </svg>
                    <span
                        class="ml-2">{{ __('%s in %s', [carbon($info['birthday'] ?? '')->format('d M, Y'), $info['place_of_birth'] ?? 'n/a']) }}</span>
                </div>
                <p class="text-primary-300 mt-8" x-data="{ toggleMore: false }">
                    @php
                        $words = explode(' ', $info['biography'] ?? '');
                    @endphp
                    @if (count($words) >= 50)
                        @php
                            $hidden_words = join(' ', array_slice($words, 50));
                            $shown_words = join(' ', array_slice($words, 0, 50));
                            $trans = [
                                'show_more' => __('Read more'),
                                'show_less' => __('Read less'),
                            ];
                        @endphp
                        {{ $shown_words }}
                        <span x-cloak x-show="!toggleMore">...</span>
                        <span x-cloak x-show="toggleMore" x-transition>
                            {{ $hidden_words }}
                        </span>
                        <button x-on:click="toggleMore = !toggleMore"
                            class="block mx-auto md:mx-0 underline hover:text-primary-100"
                            x-text="toggleMore ? '{{ $trans['show_more'] }}' : '{{ $trans['show_less'] }}' "></button>
                    @else
                        {{ join(' ', $words) }}
                    @endif

                </p>
                @isset($info['also_known_as'])
                    <h4 class="font-semibold mt-8">{{ __('Also Known As:') }}</h4>
                    <p class="text-sm -ml-1">
                        <span class="px-1 bg-primary-900 inline-block rounded-sm m-1">
                            {!! join('</span><span class="px-1 bg-primary-900 inline-block rounded-sm m-1">', $info['also_known_as']) !!}
                        </span>
                    </p>
                @endisset
            </div>
        </div>
        @include('includes.collection', ['collection' => $collection])
    </main>

@stop
