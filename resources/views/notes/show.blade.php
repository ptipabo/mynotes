@extends('layout')

@section('content')

<section class="pageTitle">
    <a href="/notes" title="Retour">Retour</a>
    <img src="../storage/logos/{{ $note->image }}" alt="{{ $note->title }}" />
    <h1>{{ $note->title }}</h1>
</section>
<section>
    <div class="customContent">
        <?php echo $note->content; ?>
    </div>
</section>

@endsection