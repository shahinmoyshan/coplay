@php
    $title = 'Explore: ' . cms('title') . ' - ' . cms('tagline');
@endphp

@section('title', $title)

@extends('layout.master')

@section('content')
    <main class="container my-5">

        <h2 class="text-center text-3xl font-semibold text-primary-200 mb-2">{!! $heading !!}</h2>

        @php
            $links = $paginator->links(
                entity: [
                    'next' => _e('Next'),
                    'prev' => _e('Prev'),
                ],
            );
        @endphp

        @if ($paginator->hasLinks())
            <div class="flex justify-center">{!! $links !!}</div>
        @endif

        @if ($paginator->isNotEmpty())
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-5">
                @foreach ($paginator as $video)
                    <x-video-card :$video />
                @endforeach
            </div>
        @endif

        @if ($paginator->hasLinks())
            <div class="flex justify-center mt-6">{!! $links !!}</div>
        @endif

    </main>
@stop
