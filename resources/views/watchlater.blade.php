@php
    $title = 'Watchlist: ' . cms('title') . ' - ' . config('tagline');
@endphp

@section('title', $title)
@extends('layout.master')

@section('content')
    <main class="container my-5" x-data="{
        watchlater: $persist([]),
        filter: 'all',
        /** time: {{ microtime() }} */
    }">
        <template x-if="watchlater.length > 0">
            <div>
                <div class="text-center md:flex items-center justify-between">
                    <h2 class="text-2xl font-semibold text-primary-200 mb-2 md:mb-0">{{ __('Saved to Watchlist') }}
                    </h2>
                    <button @click="watchlater = []" class="text-rose-400 font-semibold">{{ __('Clear All') }}</button>
                </div>
                <div class="flex justify-center md:justify-start mt-5">
                    <button @click="filter = 'all'"
                        :class="filter == 'all' ? 'text-primary-50 border-accent-400' :
                            'text-primary-400 hover:text-primary-200 border-transparent'"
                        class="border-b-4 text-lg font-semibold">{{ __('All') }}</button>
                    <button @click="filter = 'movie'"
                        :class="filter == 'movie' ? 'text-primary-50 border-accent-400' :
                            'text-primary-400 hover:text-primary-200 border-transparent'"
                        class="border-b-4 text-lg font-semibold ml-3">{{ __('Movie') }}</button>
                    <button @click="filter = 'tv'"
                        :class="filter == 'tv' ? 'text-primary-50 border-accent-400' :
                            'text-primary-400 hover:text-primary-200 border-transparent'"
                        class="border-b-4 text-lg font-semibold ml-4">{{ __('Tv Series') }}</button>
                </div>
            </div>
        </template>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-5">
            <template x-for="(video, index) in watchlater">
                <div x-cloak x-show="['all', video.type].includes(filter)" class="mt-8">
                    @include('includes.alpine-card')
                </div>
            </template>
        </div>
        <div x-cloak x-show="watchlater.length == 0" class="text-center py-4">
            <h2 class="text-primary-400 text-2xl mb-1">{{ __('Watchlist is Empty') }}</h2>
            <a class="text-accent-400 hover:text-accent-500" href="{{ home_url() }}">&larr; {{ __('Home') }}</a>
        </div>
    </main>
@stop
