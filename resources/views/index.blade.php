
@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="panel-heading"><h1>Books for readings </h1></div>
            <div>
                <button class="btn btn-primary" onclick="showDiv()">Show more details</button>
            </div>
            <br>
            <br>
        </div>
    </div>
<div id = "main">
    <div class="row ml-auto mr-3">
                            @foreach ($books as $book)
                               <div class="col-sm-6 col-md-4">
                                        <img src="{{ asset('/images/'.$book->cover_image) }}" alt="{{ $book->title }}" class="img-fluid">
                                            <h2>{{ $book->title }}</h2>
                                                <div id="myDiv" class="bookDetails" style="display: none;">
                                                    <ul class=">author">
                                                        @foreach($book->authors as $author)
                                                            {{ $author->name }}
                                                        @endforeach
                                                    </ul>
                                                    <ul class="genre">
                                                        @foreach($book->genres as $genre)
                                                            {{ $genre->name }}
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            <p> {{ $book->description }}</p>
                               </div>
                            @endforeach

                </div>
</div>
      <script>
        function showDiv() {

            var x = $("#myDiv").css("display");

            if (x === "none") {
                $(".bookDetails").css("display", "block");
            } else {
                $(".bookDetails").css("display", "none");
            }
        }
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>


        $(document).ready(function() {

            $('#button, .checkbox_genre, .checkbox_author').on('click', function() {

                var genres = [];
                var authors = [];



                $('.checkbox_genre').each(function () {
                    if ($(this).is(":checked")) {
                        genres.push($(this).val());
                    }
                });

                $('.checkbox_author').each(function () {
                    if ($(this).is(":checked")) {
                        authors.push($(this).val());
                    }
                });

                let search = $('#search').val();


                filterBooks(genres, authors, search);

                String.prototype.format  = function(){
                    var args = arguments;
                    return this.replace(/\{(\d+)\}/g, function(m,n){
                        return args[n] == null ? m : args[n].toString() ;
                    });
                };

                const bookTemplate = `
<div class="row ml-auto mr-3">
                            <div class="col-sm-6 col-md-4">

                                    <div class="thumbnail">

                                        <div class="caption">
                                            <h3>{0}</h3>

                            <img src=http://127.0.0.1:8000/images/{4}  class="img-fluid"">
                            <div id="myDiv" class="bookDetails" style="display: none;">
                                            <ul class="authors">
                                                 {2}

                                                 </ul>
                                               <ul class="genre">
                                                {3}

                                               </ul>
                                                </div>
                                            <p> {1}</p>

                                        </div>
                                    </div>
                               </div>
`



                function filterBooks(genres, authors, search) {

                    $.ajax({
                        url: "{{  route('search') }}",
                        method: "GET",
                        data: {
                            genres: genres,
                            authors: authors,
                            search: search

                        },
                        success: function (data) {

                            let bookshtml = "";

                            for ( let book of data.data) {
                                bookshtml += bookTemplate.format(book.title, book.description, "genres", "authors", book.cover_image);
                        //        bookshtml += "<p> " + book.title + "</p>";

                            }
                            $('#main').html(bookshtml);


                        }

                        //  var filBooks = JSON.stringify(data);


                    });

                    //  function get_filter(class_name)
                    //  {
                    //      var filter =[];
                    //    $('.'+class_name+':checked').each(function() {
                    //        filter.push($(this).val());
                    //     });
                    //      return filter;
                    //   }

                }
            });

        });
        </script>
@endsection


