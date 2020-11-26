@extends('layout')

@section('content')

<section class="pageTitle">
    <img src="../img/logos/{{ $note->image }}" alt="{{ $note->title }}" />
    <h1>{{ $note->title }}</h1>
</section>
<section>
    <div>
        <?php echo $note->content; ?>
    </div>
</section>

@endsection