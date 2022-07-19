<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>XML</title>

    </head>
    <body>
        <nav>
            <ul>
                <li>
                    <a href="{{route('persons.create')}}">XML feltöltése</a>
                </li>
                <li>
                    <a href="{{route('persons.index')}}">Feltöltött adatok listája</a>
                </li>
                <li>
                    <a href="{{route('logs.index')}}">Logok listája</a>
                </li>
            </ul>
        </nav>
        <main>
            <div>
                @yield('content')
            </div>
        </main>
    </body>
</html>
