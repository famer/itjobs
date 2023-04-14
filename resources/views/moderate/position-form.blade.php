@extends('layout.app')

@section('content')

    {{ $position->title }}<br />
    {{ $position->description }}<br />
    <form method="post" action="{{ route('moderate.position', $position) }}">
        @csrf
        @method('PATCH')
        <input type="hidden" name="moderated" value="remoderation">
        <textarea name="comments"></textarea>
        <button class="text-red-500" type="submit">Send back</button>
    </form>

@endsection