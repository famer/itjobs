@extends('layout.app')

@section('title', __('pages.Moderate company') . ' - ' . $company->name)

@section('content')

    <h1 class="text-lg">{{ $company->name }}</h1>
    <form method="post" action="{{ route('moderate.company', $company) }}">
        @csrf
        @method('PATCH')
        <input type="hidden" name="moderated" value="remoderation">
        <div>
            <textarea required placeholder="{{ __('moderate.Comments') }}" class="border border-gray-300 py-1.5 px-2 border-2 rounded-lg" name="comments"></textarea>
        </div>
        <button class="hover:bg-red-500 bg-red-300 px-2 py-1.5 rounded text-grey-500" type="submit">{{ __('moderate.Send back') }}</button>
    </form>

@endsection