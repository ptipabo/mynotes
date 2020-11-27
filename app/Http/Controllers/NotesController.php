<?php

namespace App\Http\Controllers;

use App\Note;
use App\Skill;
use App\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    //Affiche toutes les notes
    function index(){
        $notes = Note::all();
        $categories = Category::all();
        return view('notes.index', compact('notes', 'categories'));
    }

    //Affiche le formulaire de création d'une note
    function create(){
        $categories = Category::orderBy('title')->get();
        $note = new Note();

        return view('notes.create', compact('categories', 'note'));
    }

    //Récupère les données du formulaire de création et les utilise pour créer la nouvelle note dans la base de données
    function store(){
        request()->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required|integer',
            'status' => 'required|integer'
        ]);

        $note = new Note();

        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('/storage/logos');
            $image->move($destinationPath, $name);
            $note->image = $name;
        }

        $note->title = request()->get('title');
        $note->content = request()->get('content');
        $note->category = request()->get('category');
        $note->status = request()->get('status');

        $note->save();

        //Note::create($data);

        return redirect('notes');
    }

    //Affiche une note en particulier
    function show(Note $note){
        //$note = Note::where('id', $note)->firstOrFail();
        return view('notes.show', compact('note'));
    }

    //Affiche le formulaire de modification d'une note
    function edit(Note $note){
        $categories = Category::orderBy('title')->get();

        return view('notes.edit', compact('note', 'categories'));
    }

    //Récupère les données du formulaire de modification et les utilise pour mettre à jour la note concernée dans la base de données
    function update(Note $note){

        //On vérifie que tous les champs sont remplit correctement
        request()->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required',
            'category' => 'required|integer',
            'status' => 'required|integer'
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
            $note->image = $name;
        }

        //On remplace les données de l'objet qui sera envoyé à la base de données par les nouvelles
        $note->title = request()->get('title');
        $note->content = request()->get('content');
        $note->category = request()->get('category');
        $note->status = request()->get('status');

        //On enregistre les modifications dans la base de données
        $note->save();

        //On se rend ensuite sur la page de la note concernée
        return redirect('notes/'.$note->id);
    }

    //Supprime une note de la base de données
    function destroy(Note $note){
        
        //On vérifie tout d'abord si aucune autre note n'utilise la même image
        $otherUseDetected = false;//Cette variable servira de détecteur en cas d'utilisation par une autre compétence ou note
        $notes = Note::all();
        foreach($notes as $item){
            if ($item->image == $note->image && $item->id != $note->id) {
                $otherUseDetected = true;
                break;
            }
        }

        //On effectue la même vérification pour les compétences
        $skills = Skill::all();
        foreach($skills as $item){
            if ($item->image == $note->image && $item->id != $note->id) {
                $otherUseDetected = true;
                break;
            }
        }

        //Si aucune autre utilisation n'a été détectée, on peut supprimer l'image
        if($otherUseDetected == false){
            //On indique le chemin vers le fichier à supprimer
            $image_path = public_path('/storage/logos/'.$note->image);

            if(File::exists($image_path)) {
                //On supprime l'image
                unlink($image_path);
            }
        }

        //On supprime la note de la base de données
        $note->delete();
        
        //On se rend sur la page des notes
        return redirect('notes');
    }
}
