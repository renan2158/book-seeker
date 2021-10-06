@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/results/styles.min.css') }}">

    <div class="results-header">
        <nav>
            <a href="{{ route('home') }}">
                <img alt="Bookseeker logo" src={{ asset('img/white-logo.svg') }} />
            </a>

            <div class="nav-links">
                <a href="#!">
                    Contact
                </a>
                <a href="#!">
                    About us
                </a>
            </div>
        </nav>

        <h1>Results</h1>

        <form class="search-field" method="get" action={{ route('books.index') }}>
            @csrf
            <input id="search_query" name="search_query" value={{ $query }} autocomplete="off" />

            <button type="submit">
                <img alt="Search icon" src="{{ asset('img/search.svg') }}" />
            </button>
        </form>
    </div>
    <div class="results-container">
        <ul>
            @foreach ($books as $book)
                <li>
                    @if (isset($book['volumeInfo']['imageLinks']))
                        <img class="thumbnail" src={{ $book['volumeInfo']['imageLinks']['smallThumbnail'] }} />
                    @else
                        <div class="thumbnail without-image">
                            <span>No available image</span>
                        </div>
                    @endif

                    <div class="book-info">
                        <span class="title">{{ $book['volumeInfo']['title'] }}</span>

                        @if (isset($book['volumeInfo']['authors']))
                            <span class="author">
                                {{ join(', ', $book['volumeInfo']['authors']) }}
                            </span>
                        @else
                            <span class="author">There aren't registered authors</span>
                        @endif

                        <p class="description">
                            {{ $book['volumeInfo']['description'] ?? "No available description." }}
                        </p>

                        <span class="other-info">
                            @if (isset($book['volumeInfo']['publishedDate']))
                                @php
                                    $formatted_date = "";
                                    $published_date = $book['volumeInfo']['publishedDate'];

                                    if (strlen($published_date) == 4) {
                                        $formatted_date = $published_date;
                                    } else {
                                        $published_date = date_create($published_date);
                                        $formatted_date = date_format($published_date, 'M d, Y');
                                    }
                                @endphp

                                <strong>{{ $formatted_date }}</strong>
                            @endif
                        </span>

                        @if (isset($book['volumeInfo']['pageCount']))
                            <span class="other-info">
                                {{ $book['volumeInfo']['pageCount'] }} pages
                            </span>
                        @endif
                    </div>

                    <div class="info-link">
                        @if ($book['volumeInfo']['infoLink'])
                            <a href={{ $book['volumeInfo']['infoLink'] }} target="_blank">
                                <img src={{ asset('img/globe.svg') }} />
                                More info
                            </a>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

@push('js')
    $(document)
@endpush
