<!DOCTYPE html>
<html>
    <head>
        <title>IT Jobs @yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous"></script>
        @vite('resources/js/jquery.cookie.js')
        <!--script src="https://cdn.tailwindcss.com"></script-->
    </head>
    <body>
        <div class="p-2 mb-5 border-b-2">
            <a href="{{ route('home') }}">🏠</a>          
            <a class="hover:underline" href="{{ route('company') }}">{{ __('messages.Companies') }}</a>

            <form class="inline" action="{{ route('search') }}" method="get">
                <input class="border-2 py-1 border-gray-300 rounded-lg" type="text" name="query" placeholder="{{ __('messages.Search') }}" value="{{ request()->query('query') }}">
                <button class="bg-blue-500 text-white px-2 py-1 rounded" type="submit">{{ __('messages.Search') }}</button>
            </form>

            @canany(['moderate', 'moderate-companies'])
                <a class="hover:underline" href="{{ route('moderate.companies') }}">{{ __('messages.Moderate companies') }}
                ({{ \App\Http\Controllers\Moderate\CompaniesController::moderateCount() }})
                </a>
            @endcan
            @canany(['moderate', 'moderate-positions'])
                <a class="hover:underline" href="{{ route('moderate.positions') }}">{{ __('messages.Moderate positions') }}
                ({{ \App\Http\Controllers\Moderate\PositionsController::moderateCount() }})
                </a>
            @endcan
            <div class="py-2 inline float-right">
            @if (!auth()->user())
                <a class="hover:underline" href="{{ route('register') }}">{{ __('messages.Registration') }}</a>
                <a class="hover:underline" href="{{ route('login') }}">{{ __('messages.Login') }}</a>
            @else
                <span>{{ auth()->user()->name }} 
                    @if (auth()->user()->getNotificationsCount())
                        <a href="{{ route('notifications') }}">( {{ auth()->user()->getNotificationsCount() }} )</a>
                    @endif
                </span>
                <form class="inline" method="post" action="{{ route('logout') }}">
                    @csrf
                    <button class="hover:underline text-red-500" type="submit">{{ __('messages.Logout') }}</button>
                </form>
            @endif
            </div>
        </div>
        <div class="container p-4">
            @yield('content')
        </div>
        <div id="cookie_block" class="fixed top-0 left-0 right-0 bg-blue-300 px-2 py-2 rounded">
            <span class="text-gray-800">{{ __('messages.Сookie') }}</span><br>
            <a class="btn btn-blue clear-both">{{ __('messages.Accept cookie') }}</a>
        </div>
        <script>
            $('#cookie_block').hide();

            $(function() {
               
                if ( $.cookie('cookieAccept') == null ) {
                    $('#cookie_block').show();
                }
                $('#cookie_block a').on('click', function() {
                    $.cookie('cookieAccept', 'true', { expires: 365, path: '/' });
                    $('#cookie_block').hide();
                });
             
            })
        </script>
    </body>
</html>