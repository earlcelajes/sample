<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

interface BookService
{
    public function addBook(Request $request);
}
