<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function getAll(Request $request)
    {
        return response()->json(Book::all());
    }

    public function getByName(Request $request,$name){
        return response()->json(Book::where('name',$name)->get());
    }
    
    public function addNewBook(Request $req){
        $newBook = Book::create([
            'name'=>$req->input('name'),
            'price'=>$req->input('price'),
            'year'=>$req->input('year')
        ]);
        return response()->json($newBook);
     } 
     public function updateExistingBook(Request $req, $id){
        $existingBook = Book::where('id',$id)->firstOrFail();
        $existingBook->name = $req->input('name');
        $existingBook->price = $req->input('price');
        $existingBook->year = $req->input('year');
        return response()->json($existingBook->save());

    }

    public function deleteExistingBook($id){
        $existingBook = Book::where('id',$id)->firstOrFail();
        $existingBook->delete();
        return response()->json("ok");

    }

}
