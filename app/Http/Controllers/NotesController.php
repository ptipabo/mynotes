<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotesController extends Controller
{
    function home(){
        return view('home');
    }

    function notes(){
        return view('pages.notes');
    }

    function note(){
        return view('pages.note');
    }
}
