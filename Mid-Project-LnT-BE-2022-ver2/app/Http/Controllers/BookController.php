<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // jangan lupa tambahin Book Modelnya (di module belum ada dikasih tau)

class BookController extends Controller // CRUD (Create Read Update Delete)
{
    // --------------------------------------------CREATE---------------------------------------------------
    public function viewCreate(){ // function untuk menampilkan page untuk add book
        return view('create');
    }

    public function create(Request $request){ // function untuk melakukan post request add book
        Book::create([
            'bookTitle' => $request->title,
            'bookAuthor' => $request->author,
            'bookPages' => $request->pages,
            'bookYear' => $request->year
        ]);
        return redirect('view');
    }

    // --------------------------------------------READ---------------------------------------------------
    public function viewBook(){ // function untuk menampilkan page view book
        $books = Book::all();
        return view('view')->withBooks($books);
    }

    
    // --------------------------------------------UPDATE---------------------------------------------------
    public function viewUpdate($id){ // function untuk menampilkan page update / edit book
        $editBook = Book::find($id);
        return view('update', ['book' => $editBook]);
    }

    public function update(Request $request, $id){ // function untuk melakukan post request update book
        $book = Book::where('id', '=', $id)->first();
        $book->update([
            'bookTitle' => $request->title,
            'bookAuthor' => $request->author,
            'bookPages' => $request->pages,
            'bookYear' => $request->year
        ]);

        return redirect('view');
    }

    // --------------------------------------------DELETE---------------------------------------------------
    public function delete($id){
        Book::destroy($id);
        return redirect('view');
    }
        

}
