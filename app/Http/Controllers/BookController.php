<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookController extends Controller
{
    public function index(Request $request) {
        $api_key = env('API_KEY', false);

        $response = Http::get("https://www.googleapis.com/books/v1/volumes", [
            'q' => $request->search_query,
            'key' => $api_key,
        ]);

        $data = json_decode($response->body(), true);

        return view('results', [
            'books' => $data['items'],
            'query' => $request->search_query
        ]);
    }
}
