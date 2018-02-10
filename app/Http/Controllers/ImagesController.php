<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Intervention\Image\Facades\Image;


class ImagesController extends Controller
{
    public function booksMiniature($id, $sizeHeight, $sizeWidth){
        $book = Book::findOrFail($id);
        $img_path = asset('storage/books/' . $id . '/img_books/' . $book->img_book );
        $img = Image::make($img_path)->fit($sizeHeight,$sizeWidth)->response('jpg', 90);
        return $img;
    }
}
