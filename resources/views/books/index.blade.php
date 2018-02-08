@extends('layouts.app')

@section('content')
    @if(session('message-delete'))
        <div class="alert alert-danger" role="alert">
            {{session('message-delete')}}
        </div>
    @elseif(session('message-add'))
        <div class="alert alert-success" role="alert">
            {{session('message-add')}}
        </div>
    @elseif(session('message-update'))
        <div class="alert alert-info" role="alert">
            {{session('message-update')}}
        </div>
    @endif
    <div class="container-fluid" style="margin-bottom: 20px;">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-info" href="{{ url('/books/create') }}">Dodaj nową książkę</a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <table class="table table-hover">
                <tr>
                    <th>Autor</th>
                    <th>Tytuł</th>
                    <th>Data wydania</th>
                    <th>Opis</th>
                    <th>Opcje</th>
                </tr>
                @if($books->count())
                    @foreach($books as $key =>$book)
                        <tr>
                            <td>{{ $book->author }}</td>
                            <td>{{ strlen($book->title) > 10 ? substr($book->title,0,10)."..." : $book->title }}</td>
                            <td>{{ $book->date_of_issue }}</td>
                            <td>{{ strlen($book->description) > 100 ? substr($book->description,0,100)."..." : $book->description }}</td>
                            <td><a class="btn btn-info" href="{{ url('/books/' . $book->id) }}">Szeczegóły</a>
                                <a class="btn btn-info" href="{{ url('/books/' . $book->id . '/edit') }}">Edycja</a>
                                <a class="btn btn-danger" href="{{ url('/books/destroy/' . $book->id) }}">Usuń</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
        {!! $books->links() !!}
    </div>
@endsection