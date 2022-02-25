<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class bookController extends Controller
{
    public function add_book_form()
    {
        if (\View::exists("book.add")) {
            return view("book.add");
        }
    }

    public function submit_book_data(Request $request)
    {
        $rules = [
            "bookTitle" => "required|min:5|max:20|unique:books",
            "bookAuthor" => "required|min:5|max:20",
            "pages" => "required|min:1",
            "publishYear" => "required|min:2000|max:2021",
        ];

        $errorMessage = ["required" => "Please fill this section !"];

        $this->validate($request, $rules, $errorMessage);

        book::create([
            "bookTitle" => $request->bookTitle,
            "bookAuthor" => $request->bookAuthor,
            "pages" => $request->pages,
            "publishYear" => $request->publishYear,
        ]);

        $this->message("message", "book successfully added !");
        return redirect()->back();
    }

    public function fetch_all_book()
    {
        $books = Book::toBase()->get();
        return view("book.index", compact("books"));
    }

    public function edit_book_form(Book $book)
    {
        return view("book.edit", compact("book"));
    }

    public function edit_book_form_submit(Request $request, Book $book)
    {
        $rules = [
            "bookTitle" => "required|min:5|max:20|unique:books",
            "bookAuthor" => "required|min:5|max:20",
            "pages" => "required|min:1",
            "publishYear" => "required|min:2000|max:2021",
        ];

        $errorMessage = [
            "required" => "Please fill this section !",
        ];

        $this->validate($request, $rules, $errorMessage);

        $book->update([
            "bookTitle" => $request->bookTitle,
            "bookAuthor" => $request->bookAuthor,
            "pages" => $request->pages,
            "publishYear" => $request->publishYear,
        ]);

        $this->message("message", "Book successfully updated!");
        return redirect()->back();
    }

    public function view_single_book(Book $book)
    {
        return view('book.view', compact('book'));
    }

    public function delete_book(Book $book)
    {
        $book->delete();
        $this->message('message','Book deleted successfully!');
        return redirect()->back();
    }

    public function message(string $name = null, string $message = null)
    {
        return session()->flash($name, $message);
    }

}
