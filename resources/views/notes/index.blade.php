@extends('layout')

@section('content')

<section class="pageTitle">
    <h1>Notes</h1>
</section>
<section>
    <a class="button button-yellow" href="/notes/create">Créer une nouvelle note</a>
</section>
<section>
    @foreach ($notes as $note)
    <div>
        <h3>
            {{ $note->name }}
        </h3>
        <div>
            <?php echo $note->content; ?>
        </div>
    </div>
    @endforeach
</section>

@endsection