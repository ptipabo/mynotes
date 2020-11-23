<?php

namespace App\Http\Controllers;

use App\Note;
use App\Category;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    function index(){
        $notes = Note::all();
        return view('notes.index', compact('notes'));
    }

    function create(){
        $categories = Category::orderBy('title')->get();

        return view('notes.create', compact('categories'));
    }

    function store(){
        $data = request()->validate([
            'name' => 'required',
            'content' => 'required',
            'image' => 'required',
            'category' => 'required|integer',
            'status' => 'required|integer'
        ]);

        Note::create($data);

        return back();
    }

    function show(){
        return view('notes.show');
    }
}
