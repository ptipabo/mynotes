<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    function index(){
        $notes = Note::all();
        return view('notes.index', compact('notes'));
    }

    function create(){
        return view('notes.create');
    }

    function show(){
        return view('notes.show');
    }
}
