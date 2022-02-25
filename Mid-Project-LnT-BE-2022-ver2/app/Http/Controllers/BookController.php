<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // jangan lupa tambahin Book Modelnya (di module belum ada dikasih tau)

class BookController extends Controller
{
    public function viewCreate(){
        return view('create');
    }

    public function create(Request $request) {
        Book::create([
            'bookTitle' => $request->title,
            'bookAuthor' => $request->author,
            'bookPages' => $request->pages,
            'bookYear' => $request->year
        ]);
        return redirect('show');
    }
}
