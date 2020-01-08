<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {

        $data=Book::paginate(40);

        return view('book.index',compact('data'));
    }


    public function create()
    {
        return view('book.create');
    }


    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'book_name' => 'required|max:255',
            'author_name' => 'required|max:255',
        ]);

        BooK::create($validatedData);


        session()->flash('status','Books Created Successfully');


        return back();

    }


    public function show(Book $book)
    {
        //
    }


    public function edit(Book $book)
    {

        return view('book.edit',compact('book'));

    }


    public function update(Request $request,$id)
    {

        $book=Book::find($id);
        if(empty($book)){
            abort(403, 'Unauthorized action.');
        }

        $validatedData = $request->validate([
            'book_name' => 'required|max:255',
            'author_name' => 'required|max:255',
        ]);

        $book->update($validatedData);


        session()->flash('status','Books Updated Successfully');


        return redirect()->route('books.index');
    }

   
    public function destroy($id){

        $book=Book::find($id);
        if(empty($book)){
            abort(403, 'Unauthorized action.');
        }

        $book->delete();
        session()->flash('status','Your information is being deleted');
        return redirect()->back();
    }
}
