@extends('layout.app')

@section('content')

    @forelse ($companies as $company)
        <h3 class="font-bold">{{ $company->name }}</h3>

        <a class="hover:bg-red-200 bg-red-300 px-2 py-1.5 rounded text-red-500" href="{{ route('moderate.company.form', $company) }}">Nope, edit</a>
        <form class="inline" method="post" action="{{ route('moderate.company', $company) }}">
            @csrf
            @method('PATCH')
            <input type="hidden" name="moderated" value="yes">
            <button class="hover:bg-green-200 bg-green-300 px-2 py-1.5 rounded text-grey-500" type="submit">Fine</button>
        </form>
    @empty
        <span class="text-green-500">Nothing to moderate</span>
    @endforelse

@endsection 