@extends('layout.app')

@section('title', '- ' . $position->title)

@section('content')
    <h1 class="text-lg">{{ $position->title }}</h1>
    <div>{!! nl2br(e($position->description)) !!}</div>
    <a class="underline" href="{{ URL::previous() }}">{{ __('positions.Back') }}</a>
@endsection