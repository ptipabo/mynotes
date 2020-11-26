@extends('layout')

@section('content')

<section class="pageTitle">
    <h1>Créer une nouvelle note</h1>
</section>
<section>
    <form action="/notes" method="POST">
        @include('includes.noteForm')
        <button type="submit" class="button button-yellow">Créer cette note</button>
    </form>
</section>

@endsection