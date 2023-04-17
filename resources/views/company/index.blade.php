@extends('layout.app')

@section('content')


    <form action="{{ route('company') }}" method="post">
        @csrf
        <input type="text" name="name" value="{{ old('name') }}" placeholde="Name" required class="relative block w-full rounded-t-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold rounded py-1 px-4">Save</button>
    </form>

    @if($toEdit->count())
        <div class="mb-5">
            <h3 class="text-xl text-red-500">To edit</h3>

            @foreach( $toEdit as $company )
                <h3><a href=" {{  route('company.edit', $company) }} ">{{ $company->name }}</a></h3>
            @endforeach
        </div>
    @endif

    <div class="mb-5">
        <h3 class="text-xl">Companies</h3>

        @foreach( $companies as $company )
            <h3><a href=" {{  route('company.show', $company) }} ">{{ $company->name }}</a></h3>
        @endforeach
    </div>

@endsection