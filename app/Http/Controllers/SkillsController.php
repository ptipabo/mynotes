<?php

namespace App\Http\Controllers;

use App\Note;
use App\Skill;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    //Affiche toutes les compétences
    function index(){

        $skills = Skill::orderByDesc('level')->get();
        $levels = ['Compréhension du concept de base',
            'Compréhension du fonctionnement de base',
            'Maîtrise partielle des outils de base',
            'Maîtrise complète des outils de base',
            'Maîtrise totale et connaissance des outils spéciaux'
        ];
        $advices = [
            'Cours complet',
            'Pratique + Tutos ciblés + Rappel',
            'Pratique + tutos ciblés',
            'Tutos ciblés',
            '/'
        ];

        return view('skills.index', compact('skills', 'levels', 'advices'));
    }

    //Affiche le formulaire de création d'une compétence
    function create(){
        $levels = [
            [1, 'Compréhension du concept de base'],
            [2, 'Compréhension du fonctionnement de base'],
            [3, 'Maîtrise partielle des outils de base'],
            [4, 'Maîtrise complète des outils de base'],
            [5, 'Maîtrise totale et connaissance des outils spéciaux']
        ];

        $skill = new Skill();

        return view('skills.create', compact('levels', 'skill'));
    }

    //Récupère les données du formulaire de création et les utilise pour créer la nouvelle compétence dans la base de données
    function store(){
        request()->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'level' => 'required|integer',
            'user' => 'required|integer'
        ]);

        $skill = new Skill();

        $skill->title = request()->get('title');

        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('/storage/logos');
            $image->move($destinationPath, $name);
            $skill->image = $name;
        }

        $skill->level = request()->get('level');
        $skill->user = request()->get('user');

        $skill->save();

        //Skill::create($data);

        return redirect('skills');
    }

    //Affiche une compétence en particulier
    function show(Skill $skill){
        //$skill = Skill::where('id', $note)->firstOrFail();
        return view('skills.show', compact('skill'));
    }

    //Affiche le formulaire de modification d'une compétence
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

    //Récupère les données du formulaire de modification et les utilise pour mettre à jour la compétence concernée dans la base de données
    function update(Skill $skill){

        //On vérifie que tous les champs sont remplit correctement
        request()->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'level' => 'required|integer',
            'user' => 'required|integer'
        ]);

        //Si le champs 'image' contient bien un fichier...
        if (request()->hasFile('image')) {
            //On stock ce fichier dans une variable
            $image = request()->file('image');
            //On récupère et on stock le nom d'origine de ce fichier
            $name = $image->getClientOriginalName();
            //On indique au script où il doit enregistrer ce fichier
            $destinationPath = public_path('/storage/logos');
            //On déplace le fichier en question dans le dossier spécifié
            $image->move($destinationPath, $name);
            //On enregistre le nom du fichier dans le champ "image" de l'objet qui sera envoyé à la base de données
            $skill->image = $name;
        }

        //On remplace les données de l'objet qui sera envoyé à la base de données par les nouvelles
        $skill->title = request()->get('title');
        $skill->level = request()->get('level');
        $skill->user = request()->get('user');

        //On enregistre les modifications dans la base de données
        $skill->save();

        //On se rend ensuite sur la page des compétences
        return redirect('skills');
    }

    //Supprime une compétence de la base de données
    function destroy(Skill $skill){

        //On vérifie tout d'abord si aucune autre compétence n'utilise la même image
        $otherUseDetected = false;//Cette variable servira de détecteur en cas d'utilisation par une autre compétence ou note
        $skills = Skill::all();
        foreach($skills as $item){
            if ($item->image == $skill->image && $item->id != $skill->id) {
                $otherUseDetected = true;
                break;
            }
        }

        //On effectue la même vérification pour les notes
        $notes = Note::all();
        foreach($notes as $item){
            if ($item->image == $skill->image && $item->id != $skill->id) {
                $otherUseDetected = true;
                break;
            }
        }

        //Si aucune autre utilisation n'a été détectée, on peut supprimer l'image
        if($otherUseDetected == false){
            //On indique le chemin vers le fichier à supprimer
            $image_path = public_path('/storage/logos/'.$skill->image);

            if(File::exists($image_path)) {
                //On supprime l'image
                unlink($image_path);
            }
        }

        //On supprime la compétence de la base de données
        $skill->delete();

        //On se rend sur la page des compétences
        return redirect('skills');
    }
}
