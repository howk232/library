@extends('layouts.app')

@section('content')
    <div class="container" style="margin-bottom: 20px;">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-info" href="{{url('/books')}}">Strona Główna</a> <a class="btn btn-info" href="{{ url('/books/' . $book->id . '/edit') }}">Edycja</a>
                <a class="btn btn-danger" href="{{ url('/books/destroy/' . $book->id) }}">Usuń</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ $book->title }}</div>
                    <div class="card-body">
                        @if(isset($book->img_book))
                            <div class="text-center" style="margin-bottom: 20px;">
                                <img class="img-fluid img-thumbnail" src="{{ url('/books-image/' . $book->id . '/200/300') }}" alt="miniature">
                            </div>
                        @endif
                        <p><strong>Autor: </strong>{{ $book->author }}</p>
                        <p><strong>Data wydania: </strong>{{ $book->date_of_issue }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p>{{ $book->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection