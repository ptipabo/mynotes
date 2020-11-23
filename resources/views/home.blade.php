@extends('layout')

@section('content')

<section class="pageTitle">
    <h1>Accueil</h1>
</section>
<section>
    <div class="sectionTitle title-yellow">
        <h2>Dernières notes créées :</h2>
    </div>
    <div class="thumb thumb-notes">
        @foreach ($lastNotes as $note)
        <div>
            <h3>
                {{ $note->name }}
            </h3>
            <div>
                <?php echo $note->content; ?>
            </div>
            <a href="/notes/{{ $note->id }}" title="{{ $note->name }}"></a>
        </div>
        @endforeach
    </div>
    <a class="button button-yellow" href="/notes" title="Voir toutes les notes">Voir toutes les notes</a>
</section>
<section>
    <div class="sectionTitle title-blue">
        <h2>Top 10 des Compétences maîtrisées :</h2>
    </div>
    <div class="thumb thumb-skills">
        @foreach ($topSkills as $skill)
            <p>{{ $skill->name }} - {{ $skill->level }}</p>
        @endforeach
    </div>
    <a class="button button-blue" href="/skills" title="Voir toutes les compétences">Voir toutes les compétences</a>
</section>

@endsection