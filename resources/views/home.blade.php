<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/global.css') }}">
        <link rel="stylesheet" href="{{ asset('css/home/styles.css') }}">
    </head>
    <body>
        <div class="homepage-header">
            <nav>
                <img alt="Bookseeker logo" src={{ asset('img/logo.svg') }} />

                <div class="nav-links">
                    <a href="#!">
                        Contact
                    </a>
                    <a href="#!">
                        About us
                    </a>
                </div>
            </nav>
        </div>
        <div class="homepage-container">
            <form class="search-field">
                <input />

                <button type="submit">
                    <img alt="Search icon" src="{{ asset('img/search.svg') }}" />
                </button>
            </form>
        </div>
    </body>
</html>
