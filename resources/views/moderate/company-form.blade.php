@extends('layout.app')

@section('content')

    {{ $company->name }}
    <form method="post" action="{{ route('moderate.company', $company) }}">
        @csrf
        @method('PATCH')
        <input type="hidden" name="moderated" value="remoderation">
        <div>
            <textarea placeholder="Comments" class="border border-gray-300 py-1.5 px-2 border-2 rounded-lg" name="comments"></textarea>
        </div>
        <button class="hover:bg-red-500 bg-red-300 px-2 py-1.5 rounded text-grey-500" type="submit">Send back</button>
    </form>

@endsection