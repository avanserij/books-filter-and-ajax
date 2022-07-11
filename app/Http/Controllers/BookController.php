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


     //  return response()->json(['data'=> $request->genres]); // передается array genre и id

        $requestGenre = $request->genres;
        $requestAuthor = $request->authors;

           $query = Book::query();
           $search = $request->search;
        if ($request->filled('search'))
        {
            $query->where('title', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%");
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

        //    return view('search', ([

        //         'books' => $books

       //]));
         }









       // $books = Book::join('genres', 'books.id', '=', 'genres.id' ) -> get();



      //  $users = Users::join('user_profiles','users.id','=','user_profiles.user_id')
    //        ->pluck('userprofile.address','email');

     //   $stocks = Stock::with('tags')
      //      ->with(['images' => function ($query) {
     //           $query->select(['id', 'url']);
      //      }])
   //         ->get();

       // $genres = DB::table('genres')->select('name')->distinct()->get()->pluck()->sort();

       //

}
