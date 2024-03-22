<?php

namespace App\Http\Implementations;


use App\Http\Services\AuthorService;
use App\Models\Author;
use Illuminate\Http\Request;

Class AuthorServiceImpl implements AuthorService
{
    public function addAutor(Request $request){
        $result = Author::create([
            'name' => $request->name
        ]);

        if(!$result){
            return response()->json([
                "success" => false,
                "message" => "Internal Server Error",
            ], 500);
        }

        return response()->json([
            "success" => true,
            "message" => "Author added successfully.",
            "data" => $result
        ], 200);
    }
}
