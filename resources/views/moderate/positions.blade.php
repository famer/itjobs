@extends('layout.app')

@section('content')

    @forelse ($positions as $position)
        <div class="mb-10">
            {{ $position->title }}<br />
            {{ $position->description }}<br />

            <a class="text-red-500" href="{{ route('moderate.position.form', $position) }}">Nope, edit</a>
            <form method="post" action="{{ route('moderate.position', $position) }}">
                @csrf
                @method('PATCH')
                <input type="hidden" name="moderated" value="yes">
                <button class="text-green-500" type="submit">Fine</button>
            </form>
        </div>
    @empty
        <span class="text-green-500">Nothing to moderate</span>
    @endforelse

@endsection 