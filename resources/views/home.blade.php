@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/home/styles.min.css') }}">

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
        <form class="search-field" action={{ route('books.index') }}>
            @csrf
            <input name="search_query" autocomplete="off" />

            <button type="submit">
                <img alt="Search icon" src="{{ asset('img/search.svg') }}" />
            </button>
        </form>
    </div>
@endsection
