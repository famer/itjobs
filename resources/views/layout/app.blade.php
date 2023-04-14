<!DOCTYPE html>
<html>
    <head>
        <title>My page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        <!--script src="https://cdn.tailwindcss.com"></script-->
    </head>
    <body>
        <div class="p-2 mb-5">
            <a class="hover:underline" href="{{ route('login') }}">Login</a>
            <form class="inline" method="post" action="{{ route('logout') }}">
                @csrf
                <button class="hover:underline text-red-500" type="submit">Logout</button>
            </form>
            <a class="hover:underline" href="{{ route('company') }}">Companies</a>
            <a class="hover:underline" href="{{ route('moderate.companies') }}">Moderate companies</a>
            <a class="hover:underline" href="{{ route('moderate.positions') }}">Moderate positions</a>
        </div>
        @yield('content')
    </body>
</html>