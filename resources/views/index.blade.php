@extends('layout.app')

@section('title', __('pages.Home page'))

@section('content')
    <h1 class="text-3xl font-bold underline">
        Hello 
        @if (auth()->user())
            {{ auth()->user()->name }}!
        @else
            world!
        @endif
    </h1>
@endsection