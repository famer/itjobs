@extends('layout.app')

@section('content')

    <h1 class="text-xl">{{ $position->title }}</h1>
    <form action="{{ route('position.edit', $position) }}" method="post">
        @csrf
        @method('PATCH')
        <input class="border border-gray-300 border-2 rounded-lg" type="text" name="title" value="{{ $position->title }}">
        @error('title')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
        @enderror
        <textarea class="border border-gray-300 border-2 rounded-lg" name="description">{{ $position->description }}</textarea>
        @error('description')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
        @enderror
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold rounded py-1 px-4">Save</button>
    </form>
    @if($position->moderationComments)
        <div class="bg-red-500 w-48 rounded">{{ $position->moderationComments }}</div>
    @endif

@endsection