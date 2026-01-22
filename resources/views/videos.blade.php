@extends('layout.master')
@php
    $title = cms('title', 'CoPlay') . ' - ' . cms('tagline', 'Stream Free Movies & TV Series Online');
    $intro = [
        'title' => cms('intro', 'Welcome to CoPlay, Free Streaming Platform'),
        'description' => cms('description'),
    ];
@endphp

@section('title', $title)

@section('content')
    <main class="container my-5">
        @include('includes/slider', ['sliderItems' => $sliderItems ?? null])
        @include('includes/intro', $intro)

        @include('includes/collection', ['collection' => $collection])
        @include('includes/top', ['top' => $top ?? null])
        @include('includes/people', ['people' => $people ?? null])
    </main>
@stop
