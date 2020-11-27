@extends('layout')

@section('content')

<section class="pageTitle">
    <a href="/skills" title="Retour">Retour</a>
    <h1>Créer une nouvelle compétence</h1>
</section>
<section>
    <form action="/skills" method="POST" enctype="multipart/form-data">
        @include('includes.skillForm')
        <button type="submit" class="button button-blue">Créer cette compétence</button>
    </form>
</section>

@endsection