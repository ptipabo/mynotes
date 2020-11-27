@extends('layout')

@section('content')

<section class="pageTitle">
    <a href="/skills" title="Retour">Retour</a>
    <h1>Modifier une compétence</h1>
</section>
<section>
    <form action="/skills/{{ $skill->id }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @include('includes.skillForm')
        <button type="submit" class="button button-blue">Enregistrer les modifications</button>
    </form>
</section>

@endsection