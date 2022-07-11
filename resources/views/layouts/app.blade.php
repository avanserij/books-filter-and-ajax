<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name=viewport content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js">
    <link href="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">
    <link href="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>



<body>

<div id="app_data">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
        </div>
    </nav>


</div>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12 _leftNav mb-30">
                <div class="card leftNav cate-sect">

                    <div class="accordion" id="accordionExample">

                        <div class="card-header" id="headingTwo">
                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                Genres </button>
                        </div>

                            <div class="panel-body">
                                <ul>

                                    <br>

                        <!--            {!  Form::open(['action' => 'App\Http\Controllers\BookController@search', 'method' => 'GET']) !!} -->




                                    <div class="form-check ">
                                        @foreach ($genres as $genre)
                                        <input type="checkbox" name="genres[]" class="checkbox_genre" value="{{$genre->id}}" id="{{$genre->id}}">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{$genre->name}}
                                        </label> <br>
                                        @endforeach
                                </ul>
                            </div>

                                    <div class="card-header" id="headingTwo">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            Authors </button>
                                    </div>

                                    <div class="panel-body">
                                        <ul>

                                            <br>

                                    <div class="form-check ">
                                        @foreach ($authors as $author)
                                            <input type="checkbox" name="authors[]" class="checkbox_author" value="{{$author->id}}" id="{{$author->id}}">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                {{$author->name}}
                                            </label> <br>
                                        @endforeach
                                            <br>
                                    </div>




                               <!--         <label><strong>Status :</strong></label>
                                        <select class="form-control" name="genre" style="width: 200px">
                                            <option value="">--Select Status--</option>

                                            <option value=""></option>

                                        </select>
-->

           <!--                         { Form::Submit('submit', ['class' => 'btn btn-primary' ]) }} -->

                                           <form class="form-inline ">
                                        <input class="form-control mr-sm-2"  size="13" maxlength="20" id="search" name="search"  />
                                    </form>
                                    <br>

                                    <button type="submit" id="button" class="btn btn-success">
                                        Submit
                                    </button>

                                </ul>
                                </form>







                            </div>

                    </div>
                </div>
            </div>


            <div class="col-lg-9 col-md-12 col-sm-12 mb-30">
                <div class="card rightSide h-100 mb-0">
                    <span class="greencolor category_name_heading"> @yield('content')</span>
                    <div class="row m-0 causes_div">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>


</body>
</html>
