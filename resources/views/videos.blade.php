@extends('layout.master')
@php
    $title = cms('title') . ' - ' . cms('tagline');
    $intro = [
        'title' => cms('intro'),
        'description' => cms('description'),
    ];
    $sliderItems ??= null;
    $top ??= null;
    $people ??= null;
@endphp

@section('title', $title)

@section('content')
    <main class="container my-5">
        @include('includes/slider', ['sliderItems' => $sliderItems])
        @include('includes/intro', $intro)

        @include('includes/collection', ['collection' => $collection])
        @include('includes/top', ['top' => $top])
        @include('includes/people', ['people' => $people])
    </main>
@stop
