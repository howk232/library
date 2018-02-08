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
                Dodaj nową książkę
            </div>
            <div class="card-body">
                    <form method="POST" action="{{ url('/books') }}">
                        @csrf
                        @method('post')

                                <div class="form-group col-md-8 offset-md-2">
                                    <label for="title">Tytuł</label>
                                    <input type="text" class="form-control" placeholder="tytuł" name="title" value="">
                                </div>

                                <div class="form-group col-md-8 offset-md-2">
                                    <label for="author">Autor</label>
                                    <input type="text" class="form-control" placeholder="autor" name="author" value="">
                                </div>

                                <div class="form-group col-md-8 offset-md-2">
                                    <label for="date_of_issue">Autor</label>
                                    <input id="datepicker" type="text" class="form-control" placeholder="data wydania" name="date_of_issue" value="">
                                </div>

                                <div class="form-group col-md-8 offset-md-2">
                                    <label for="description">Opis</label>
                                    <textarea class="form-control" name="description" cols="30" rows="10"></textarea>
                                </div>

                                <div class="form-group col-md-8 offset-md-2">
                                    <button type="submit" class="btn btn-primary btn-sm float-right">Zapisz zmiany</button>
                                </div>
                    </form>
            </div>

        </div>
    </div>
@endsection