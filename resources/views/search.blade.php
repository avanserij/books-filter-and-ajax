
<div id="main">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Books

                        <div class="clearfix"></div>
                    </div>

                    <div class="panel-body">
                        <div class="row">

                            @if($books->isNotEmpty())
                                @foreach ($books as $book)
                                    <div class="thumbnail">
                                        <img src="{{ asset('/images/'.$book->cover_image) }}" alt="{{ $book->title }}" style="width: 312.584px; height: 470px; margin: 0px;">
                                        <div class="caption">
                                            <h3>{{ $book->title }}</h3>
                                            <ul class="tags">
                                                @foreach($book->authors as $author)
                                                    {{ $author->name }}
                                                @endforeach
                                            </ul>

                                            <ul class="name">
                                                @foreach($book->genres as $genre)
                                                    {{ $genre->name }}
                                                @endforeach
                                            </ul>
                                            <p>{{ $book->description }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div>
                                    <h2>No posts found</h2>
                                </div>
                            @endif
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>



