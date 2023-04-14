@extends('layout.app')

@section('content')
    <form class="mt-8 space-y-6" action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="group relative flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Logout</button>
    </form>
@endsection