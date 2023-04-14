@extends('layout.app')

@section('content')

    @forelse ($companies as $company)
        {{ $company->name }}<br />

        <a class="text-red-500" href="{{ route('moderate.company.form', $company) }}">Nope, edit</a>
        <form method="post" action="{{ route('moderate.company', $company) }}">
            @csrf
            @method('PATCH')
            <input type="hidden" name="moderated" value="yes">
            <button class="text-green-500" type="submit">Fine</button>
        </form>
    @empty
        <span class="text-green-500">Nothing to moderate</span>
    @endforelse

@endsection 