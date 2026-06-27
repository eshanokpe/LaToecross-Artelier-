@extends('layouts.app')

@section('title', 'Latocross Artelier - Home')
@section('meta_description', 'Discover exceptional contemporary African art at Latocross Artelier. Explore curated collections, connect with artists, and find your next masterpiece.')

@section('content')
    <livewire:home-slider />   
    <livewire:about-section />   
    <livewire:art-section-slider />   
@endsection