@extends('layout.app')

@section('content')

    @forelse ($positions as $position)
        <div class="mb-10">
            {{ $position->title }}<br />
            {{ $position->description }}<br />

            <a class="hover:bg-red-200 bg-red-300 px-2 py-1.5 rounded text-red-500" href="{{ route('moderate.position.form', $position) }}">Nope, edit</a>
            <form class="inline" method="post" action="{{ route('moderate.position', $position) }}">
                @csrf
                @method('PATCH')
                <input type="hidden" name="moderated" value="yes">
                <button class="hover:bg-green-200 bg-green-300 px-2 py-1.5 rounded text-grey-500" type="submit">Fine</button>
            </form>
        </div>
    @empty
        <span class="text-green-500">Nothing to moderate</span>
    @endforelse

@endsection 