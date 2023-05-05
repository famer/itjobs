@extends('layout.app')

@section('title', __('pages.Notifications'))

@section('content')
    {{ __('notifications.Notifications') }}: {{ $count }}

    @if($companiesToEdit->count())
        <div class="mb-5">
            <h3 class="text-xl text-red-500">{{ __('notifications.Companies to edit') }}</h3>

            @foreach( $companiesToEdit as $company )
                <h3><a href=" {{  route('company.edit', $company) }} ">{{ $company->name }}</a></h3>
            @endforeach
        </div>
    @endif

    @if($positionsToEdit->count())
        <div class="mb-5">
            <h3 class="text-lg text-red-500">{{ __('notifications.Positions to edit') }}</h3>
            @foreach ( $positionsToEdit as $position )
                <div>
                    <h3 class="font-bold"><a class="underline" href="{{ route('position.edit', $position) }}">{{ $position->title }}</a><h3>
                </div>
            @endforeach
        </div>
    @endif

@endsection