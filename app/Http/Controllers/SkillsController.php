<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    function index(){

        $skills = Skill::all();
        $advices = [
            'Cours complet',
            'Pratique + Tutos ciblés + Rappel',
            'Pratique + tutos ciblés',
            'Tutos ciblés',
            '/'
        ];

        return view('skills.index', compact('skills', 'advices'));
    }
}
