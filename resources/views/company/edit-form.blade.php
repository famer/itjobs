@extends('layout.app')

@section('content')
    <div class="mb-4">
        <h1 class="text-xl">{{ $company->name }}</h1>
        <form action="{{ route('company.edit', $company) }}" method="post">
            @csrf
            @method('PATCH')
            <input required class="border border-gray-300 py-1.5 px-2 border-2 rounded-lg" type="text" name="name" value="{{ $company->name }}">
            @error('name')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold rounded py-1 px-4">{{ __('company.Save') }}</button>
        </form>
    </div>
    @if($company->moderationComments)
        <div class="bg-red-300 text-grey-700 p-2 w-48 rounded">{{ $company->moderationComments }}</div>
    @endif

@endsection