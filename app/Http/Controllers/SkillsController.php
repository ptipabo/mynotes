<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkillsController extends Controller
{
    function skills(){
        return view('pages.skills');
    }
}
