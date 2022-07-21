<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {

$books = Book::All();
$genres = Genre::All();
$authors = Author::All();

        return view('index', compact('books','genres', 'authors'));

    }



    public function search(Request $request){



        $requestGenre = $request->genres;
        $requestAuthor = $request->authors;

           $query = Book::query();
           $search = $request->search;
        if ($request->filled('search'))
        {
            $query->where(function($q) use ($search){
                $q->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%");

            });




        }

        if ($request->filled('genres'))
           {
                $query->whereHas('genres', function ($q) use ($requestGenre) {
                   $q->whereIn('genres.id', $requestGenre);
              });
           }

        if ($request->filled('authors'))
        {
            $query->whereHas('authors', function ($q) use ($requestAuthor) {
                $q->whereIn('authors.id', $requestAuthor);
            });
        }

      //  $books = Book::whereHas('genres', function ($q) use ($requestGenre) {
      //              $q->whereIn('genres.id', $requestGenre);
        //           })->get();

       //валидация

        $books = $query->get();



         return response()->json(['data'=> $books]);


         }



}
