<?php

namespace App\Http\Implementations;


use App\Http\Services\AuthorService;
use App\Models\Author;
use Illuminate\Http\Request;

Class AuthorServiceImpl implements AuthorService
{
    public function getAuthors(){
        $data = Author::all();

        return response()->json([
            "success" => true,
            "message" => "Fetched authors.",
            "data" => $data
        ]);
    }

    public function addAuthor(Request $request){
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
