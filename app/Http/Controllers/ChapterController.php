<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{

    public function index()
    {

        $data=Chapter::with('book')->paginate(40);

        return view('chapter.index',compact('data'));
    }


    public function create()
    {
        $books = Book::all();

        return view('chapter.create',compact('books'));
    }


    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'book_id' => 'required',
            'chapter_name' => 'required|max:255',
        ]);

        Chapter::create($validatedData);


        session()->flash('status','Chapter Created Successfully');


        return back();

    }


    public function show(Chapter $Chapter)
    {
        //
    }


    public function edit(Chapter $chapter)
    {

        return view('chapter.edit',compact('chapter'));

    }


    public function update(Request $request,$id)
    {

        $chapter = Chapter::find($id);
        if(empty($chapter)){
            abort(403, 'Unauthorized action.');
        }

        $validatedData = $request->validate([
            'book_id' => 'required',
            'chapter_name' => 'required|max:255',
        ]);


        $chapter->update($validatedData);


        session()->flash('status','Chapter Updated Successfully');


        return redirect()->route('chapters.index');
    }


    public function destroy($id){

        $chapter = Chapter::find($id);
        if(empty($chapter)){
            abort(403, 'Unauthorized action.');
        }
        $chapter->delete();
        session()->flash('status','Your chapter is being deleted');
        return redirect()->back();
    }
}
