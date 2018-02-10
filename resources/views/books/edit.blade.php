@extends('layouts.app')

@section('content')
    <div class="container" style="margin-bottom: 20px;">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-info" href="{{url('/books')}}">Strona Główna</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Edycja książki {{ $book->title }}
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('/books/' . $book->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    @if(isset($book->img_book))
                        <div class="text-center">
                            <img class="rounded img-fluid img-thumbnail" src="{{ url('/books-image/' . $book->id . '/200/300') }}" alt="miniature">
                        </div>
                    @endif

                    <div class="form-group col-md-8 offset-md-2">
                        <label for="img_book">Ministurka</label>
                        <input type="file" class="form-control{{ $errors->has('img_book') ? ' is-invalid' : '' }}" placeholder="zdjęcie" name="img_book" value="{{ $book->img_book }}">
                        @if ($errors->has('img_book'))
                            <span class="{{ $errors->has('img_book') ? ' invalid-feedback' : '' }}">
                                <strong>{{ $errors->first('img_book') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group col-md-8 offset-md-2">
                        <label for="title">Tytuł</label>
                        <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="tytuł" name="title" value="{{ $book->title }}">
                        @if ($errors->has('title'))
                            <span class="{{ $errors->has('title') ? ' invalid-feedback' : '' }}">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group col-md-8 offset-md-2">
                        <label for="author">Autor</label>
                        <input type="text" class="form-control {{ $errors->has('author') ? ' is-invalid' : '' }}" placeholder="autor" name="author" value="{{ $book->author }}">
                        @if ($errors->has('author'))
                            <span class="{{ $errors->has('author') ? ' invalid-feedback' : '' }}">
                                <strong>{{ $errors->first('author') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group col-md-8 offset-md-2">
                        <label for="date_of_issue">Data wydania</label>
                        <input id="datepicker" type="text" class="form-control" placeholder="data wydania" name="date_of_issue" value="{{ $book->date_of_issue }}">
                    </div>

                    <div class="form-group col-md-8 offset-md-2">
                        <label for="description">Opis</label>
                        <textarea class="form-control" name="description" cols="30" rows="10">{{ $book->description }}</textarea>
                    </div>

                    <div class="form-group col-md-8 offset-md-2">
                        <button type="submit" class="btn btn-primary btn-sm float-right">Zapisz zmiany</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection