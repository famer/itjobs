@extends('layout.app')

@section('content')

    {{ $company->name }}

    @can('create-position', $company)
        <x-position-form :company="$company" />
    @endcan
    @foreach ( $company->positions->where('moderated', 'yes'); as $position )
        <div>
            <h3><a href="{{ route('position', $position) }}">{{ $position->title }}</a><h3>
            <span> {{ $position->description }}</span>
            <br />
            @can('update-position', $position)
                <a href="{{ route('position.edit', $position) }}" class="text-green-500">Edit</a>
                <form action="{{ route('position.destroy', $position) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">Delete</button>
                </form>
            @endcan
        </div>
    @endforeach
@endsection