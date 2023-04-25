@extends('layout.app')

@section('content')
    <h1 class="text-lg">Search: {{ request()->query('query') }}</h1>
    @forelse ( $positions->where('moderated', 'yes') as $position )
        <div class="mb-5">
            <h3><a class="underline" href="{{ route('position', $position) }}">{{ $position->title }}</a><h3>
            <span> {{ $position->description }}</span>
            
        </div>
    @empty
        Nothing found
    @endforelse
@endsection