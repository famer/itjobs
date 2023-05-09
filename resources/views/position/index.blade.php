@extends('layout.app')

@section('title', '- ' . $position->title)

@section('content')
    <h1 class="text-lg">{{ $position->title }}</h1>
    <div>{!! nl2br(e($position->description)) !!}</div>
    <a class="underline" href="{{route('company.show', $position->company) }}">{{ __('positions.Back') }}</a>
@endsection