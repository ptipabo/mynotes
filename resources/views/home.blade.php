@extends('layout')

@section('content')

<section class="pageTitle homeTitle">
    <h1>Accueil</h1>
</section>
<section class="sectionTitle title-yellow">
    <h2>Dernières notes créées :</h2>
</section>
<section>
    <div class="thumb thumb-notes">
        @foreach ($lastNotes as $note)
        <div>
            <img class="thumbImage" src="./storage/logos/{{ $note->image }}" alt="{{ $note->title }}" />
            <h3>
                {{ $note->title }}
            </h3>
            <div>
                <?php
                    $maxLength = 150;
                    echo strlen($note->content)>$maxLength ? substr(strip_tags($note->content), 0, $maxLength).'...' : $note->content;
                ?>
            </div>
            <a href="/notes/{{ $note->id }}" title="{{ $note->title }}"></a>
        </div>
        @endforeach
    </div>
    <a class="button button-yellow" href="/notes" title="Voir toutes les notes">Voir toutes les notes</a>
</section>
<section class="sectionTitle title-blue">
    <h2>Compétences les mieux maîtrisées :</h2>
</section>
<section>
    <div class="thumb thumb-skills">
        @foreach ($topSkills as $skill)
            <div>
                <img class="thumbImage" src="./storage/logos/{{ $skill->image }}" alt="{{ $skill->title }}" />
                <h3>{{ $skill->title }}</h3>
                <div class="starsLine">
                    @for ($i = 0; $i < $skill->level; $i++)
                        <img class="lightStar" src="./img/starFull.svg" />
                    @endfor
                    @for ($i = 0; $i < (5-$skill->level); $i++)
                        <img class="darkStar" src="./img/starEmpty.svg" />
                    @endfor
                </div>
            </div>
        @endforeach
    </div>
    <a class="button button-blue" href="/skills" title="Voir toutes les compétences">Voir toutes les compétences</a>
</section>

@endsection