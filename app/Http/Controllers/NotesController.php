<?php

namespace App\Http\Controllers;

use App\Note;
use App\Category;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    function index(){
        $notes = Note::all();
        $categories = Category::all();
        return view('notes.index', compact('notes', 'categories'));
    }

    function create(){
        $categories = Category::orderBy('title')->get();
        $note = new Note();

        return view('notes.create', compact('categories', 'note'));
    }

    function store(){
        $data = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'category' => 'required|integer',
            'status' => 'required|integer'
        ]);

        Note::create($data);

        return back();
    }

    function show(Note $note){
        //$note = Note::where('id', $note)->firstOrFail();
        return view('notes.show', compact('note'));
    }

    function edit(Note $note){
        $categories = Category::orderBy('title')->get();

        return view('notes.edit', compact('note', 'categories'));
    }

    function update(Note $note){
        $data = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'category' => 'required|integer',
            'status' => 'required|integer'
        ]);

        $note->update($data);

        return redirect('notes/' . $note->id);
    }

    function destroy(Note $note){
        $note->delete();
        
        return redirect('notes');
    }
}
