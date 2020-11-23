<?php

namespace App\Http\Controllers;

use App\Note;
use App\Skill;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        $lastNotes = Note::orderByDesc('created_at')->limit(3)->get();
        $topSkills = Skill::orderByDesc('level')->limit(3)->get();
        return view('home', compact('lastNotes', 'topSkills'));
    }
}
