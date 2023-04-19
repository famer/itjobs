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
            <a href="{{ route('home') }}">🏠</a>          
            <a class="hover:underline" href="{{ route('company') }}">Companies</a>

            @canany(['moderate', 'moderate-companies'])
                <a class="hover:underline" href="{{ route('moderate.companies') }}">Moderate companies
                ({{ \App\Http\Controllers\Moderate\CompaniesController::moderateCount() }})
                </a>
            @endcan
            @canany(['moderate', 'moderate-positions'])
                <a class="hover:underline" href="{{ route('moderate.positions') }}">Moderate positions
                ({{ \App\Http\Controllers\Moderate\PositionsController::moderateCount() }})
                </a>
            @endcan
            <div class="inline float-right">
            @if (!auth()->user())
                <a class="hover:underline" href="{{ route('register') }}">Registration</a>
                <a class="hover:underline" href="{{ route('login') }}">Login</a>
            @else
                <span>{{ auth()->user()->name }} 
                    @if (auth()->user()->getNotificationsCount())
                        <a href="{{ route('notifications') }}">( {{ auth()->user()->getNotificationsCount() }} )</a>
                    @endif
                </span>
                <form class="inline" method="post" action="{{ route('logout') }}">
                    @csrf
                    <button class="hover:underline text-red-500" type="submit">Logout</button>
                </form>
            @endif
            </div>
        </div>
        <div class="container p-4">
            @yield('content')
        </div>
    </body>
</html>