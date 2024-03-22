<?php

namespace App\Http\Controllers;

use App\Http\Services\AuthorService;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function __construct(public AuthorService $authorService){

    }

    public function addAutor(Request $request){
        return $this->authorService->addAutor($request);
    }
}
