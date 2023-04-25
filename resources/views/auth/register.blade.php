@extends('layout.app')

@section('content')
    <div class="">{{ __('register.Register') }}</div>
    <div class="w-1/3">
        <form class="mt-8 space-y-6" action="{{ route('register') }}" method="post">
            @csrf
            <input name="name" type="text" required 
            class="relative block w-full rounded-t-md border-0 py-1.5 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" 
            placeholder="{{ __('register.Name') }}" value="{{ old('name') }}">
            @error('name')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
            <input name="email" type="email" autocomplete="email" required 
            class="relative block w-full rounded-t-md border-0 py-1.5 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" 
            placeholder="{{ __('register.Email address') }}" value="{{ old('email') }}">
            @error('email')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
            <input name="password" type="password" autocomplete="current-password" required class="relative block w-full rounded-b-md border-0 py-1.5 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="{{ __('register.Password') }}">
            <input name="password_confirmation" type="password" autocomplete="current-password" required class="relative block w-full rounded-b-md border-0 py-1.5 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="{{ __('register.Password confirmation') }}">
            @error('password')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
            <button type="submit" class="group relative flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{ __('register.Register') }}</button>
        </form>
    </div>
@endsection