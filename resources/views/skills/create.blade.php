@extends('layout')

@section('content')

<section class="pageTitle">
    <h1>Créer une nouvelle compétence</h1>
</section>
<section>
    <form action="/skills" method="POST">
        @include('includes.skillForm')
        <button type="submit" class="button button-blue">Créer cette compétence</button>
    </form>
</section>

@endsection