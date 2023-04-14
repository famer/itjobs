@extends('layout.app')

@section('content')

    {{ $company->name }}
    <form method="post" action="{{ route('moderate.company', $company) }}">
        @csrf
        @method('PATCH')
        <input type="hidden" name="moderated" value="remoderation">
        <textarea name="comments"></textarea>
        <button class="text-red-500" type="submit">Send back</button>
    </form>

@endsection