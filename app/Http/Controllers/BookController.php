<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Session;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->paginate(10);
        return view('books/index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|min:3',
            'author' => 'required|min:3',

        ], [
            'required' => 'Pole jest wymagane',
            'min' => 'Pole musi mieć minimum :min',
        ]);

        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->date_of_issue = $request->date_of_issue;
        $book->description = $request->description;
        $book->save();

        return redirect()->route('books.index')->with('message-add','Książka została dodana');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required|min:3',
            'author' => 'required|min:3',

        ], [
            'required' => 'Pole jest wymagane',
            'min' => 'Pole musi mieć minimum :min',
        ]);

        $book = Book::findOrFail($id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->date_of_issue = $request->date_of_issue;
        $book->description = $request->description;
        $book->save();
        return redirect()->route('books.index')->with('message-update','Książka została zmodyfikowana');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index')->with('message-delete','Książka została usunięta');
    }
}
