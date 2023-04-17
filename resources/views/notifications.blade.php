@extends('layout.app')

@section('content')
    Notifications {{ $count }}

    @if($companiesToEdit->count())
        <div class="mb-5">
            <h3 class="text-xl text-red-500">Companies to edit</h3>

            @foreach( $companiesToEdit as $company )
                <h3><a href=" {{  route('company.edit', $company) }} ">{{ $company->name }}</a></h3>
            @endforeach
        </div>
    @endif

    @if($positionsToEdit->count())
        <div class="mb-5">
            <h3 class="text-lg text-red-500">To edit</h3>
            @foreach ( $positionsToEdit as $position )
                <div>
                    <h3><a href="{{ route('position.edit', $position) }}">{{ $position->title }}</a><h3>
                </div>
            @endforeach
        </div>
    @endif

@endsection