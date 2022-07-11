<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
use App\Models\Genre;

class Book extends Model
{
    protected $guarded = [];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'author_book');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'book_genre');
    }

}
