@extends('layout.app')

@section('title', __('pages.Home page'))

@section('content')

    @if($positions)
        <h1 class="text-xl">ИТ вакансии</h1>
    @endif

    @forelse($positions as $position)
        <div class="mb-5">
            <h3><a class="underline" href="{{ route('position', $position) }}">{{ $position->title }}</a><h3>
            <span>{!! nl2br(e($position->description)) !!}</span>
        </div>
    @empty
        <h1>Скоро здесь будут ИТ вакансии, а пока можете <a class="underline" href="{{ route('register') }}">зарегистрироваться</a> и разместить их.</h1>
    @endforelse

@endsection