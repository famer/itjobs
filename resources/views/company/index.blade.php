@extends('layout.app')

@section('content')

    @if(session('status'))
        <div class="text-red-500">
            {{ session('status') }}
        </div>
    @endif
    <div class="mb-4">
        <form action="{{ route('company') }}" method="post">
            @csrf
            <input type="text" name="name" value="{{ old('name') }}" placeholder="{{ __('company.Name') }}" required class="relative block w-15 mb-3 rounded-t-md border-0 py-1.5 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold rounded py-1 px-4">{{ __('company.Add') }}</button>
        </form>
    </div>

    @if($toEdit->count())
        <div class="mb-5 p-3 bg-red-300 rounded-lg">
            <h3 class="text-xl text-red-500">To edit</h3>

            @foreach( $toEdit as $company )
                <h3><a class="underline" href=" {{  route('company.edit', $company) }} ">{{ $company->name }}</a></h3>
            @endforeach
        </div>
    @endif

    <div class="mb-5">
        <h3 class="text-xl">{{ __('company.Companies') }}</h3>

        @foreach( $companies as $company )
            <h3><a class="underline" href=" {{  route('company.show', $company) }} ">{{ $company->name }}</a></h3>
        @endforeach
    </div>

@endsection