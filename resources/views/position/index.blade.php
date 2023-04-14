@extends('layout.app')

@section('content')
    <h1>{{ $position->title }}</h1>
    <div>{{ $position->description }}</div>
    <a href="{{route('company.show', $position->company) }}">Back</a>
@endsection