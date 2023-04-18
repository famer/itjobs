@extends('layout.app')

@section('content')

    <h1 class="text-lg">{{ $company->name }}</h1>

    @can('create-position', $company)
        <x-position-form :company="$company" />
    @endcan
    @if($company->positions->where('moderated', 'remoderation')->count())
        <div class="mb-5 p-3 bg-red-300 rounded-lg">
            <h3 class="text-lg text-red-500">To edit</h3>
            @foreach ( $company->positions->where('moderated', 'remoderation') as $position )
                <div>
                    <h3><a class="underline" href="{{ route('position.edit', $position) }}">{{ $position->title }}</a><h3>
                </div>
            @endforeach
        </div>
    @endif
    @foreach ( $company->positions->where('moderated', 'yes') as $position )
        <div class="mb-5">
            <h3><a class="underline" href="{{ route('position', $position) }}">{{ $position->title }}</a><h3>
            <span> {{ $position->description }}</span>
            <br />
            @can('update-position', $position)
                <a href="{{ route('position.edit', $position) }}" class="text-green-500">Edit</a>
                <form class="inline" action="{{ route('position.destroy', $position) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">Delete</button>
                </form>
            @endcan
        </div>
    @endforeach
@endsection