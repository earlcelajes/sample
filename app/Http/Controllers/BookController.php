<?php

namespace App\Http\Controllers;

use App\Http\Services\BookService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct(public BookService $bookService){

    }

    public function addBook(Request $request){
        return $this->bookService->addBook($request);
    }
}
