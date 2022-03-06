@extends('layouts.default')

@section('page_content')
    @include('home.intro')
    @include('home.about')
    @include('home.skills')
    @include('home.projects')
    @include('home.cursus')
    @include('home.experiences')
    @include('home.hobbies')
    @include('home.contact')
    @include('components.float-cv-dl')
@endsection
