<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    function index(){

        $skills = Skill::orderByDesc('level')->get();
        $advices = [
            'Cours complet',
            'Pratique + Tutos ciblés + Rappel',
            'Pratique + tutos ciblés',
            'Tutos ciblés',
            '/'
        ];

        return view('skills.index', compact('skills', 'advices'));
    }

    function create(){
        $levels = [
            [1, 'Concept de base'],
            [2, 'Fonctionnement de base'],
            [3, 'Maîtrise d’utilisation partielle'],
            [4, 'Maîtrise d’utilisation complète'],
            [5, 'Connaissance poussée des outils']
        ];

        $skill = new Skill();

        return view('skills.create', compact('levels', 'skill'));
    }

    function store(){
        $data = request()->validate([
            'title' => 'required',
            'image' => 'required',
            'level' => 'required|integer',
            'user' => 'required|integer'
        ]);

        Skill::create($data);

        return back();
    }

    function show(Skill $skill){
        //$skill = Skill::where('id', $note)->firstOrFail();
        return view('skills.show', compact('skill'));
    }

    function edit(Skill $skill){
        $levels = [
            [1, 'Concept de base'],
            [2, 'Fonctionnement de base'],
            [3, 'Maîtrise d’utilisation partielle'],
            [4, 'Maîtrise d’utilisation complète'],
            [5, 'Connaissance poussée des outils']
        ];

        return view('skills.edit', compact('skill','levels'));
    }

    function update(Skill $skill){

    }

    function delete(Skill $skill){
        $skill->delete();
        
        return redirect('skills');
    }
}
