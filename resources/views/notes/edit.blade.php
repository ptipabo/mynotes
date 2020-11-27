@extends('layout')

@section('content')

<section class="pageTitle">
    <a href="/notes" title="Retour">Retour</a>
    <h1>Modifier une note</h1>
</section>
<section>
    <form action="/notes/{{ $note->id }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @include('includes.noteForm')
        <button type="submit" class="button button-yellow">Enregistrer les modifications</button>
    </form>
</section>

@endsection