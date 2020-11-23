@extends('layout')

@section('content')

<section class="pageTitle homeTitle">
    <h1>Accueil</h1>
</section>
<section>
    <div class="sectionTitle title-yellow">
        <h2>Dernières notes créées :</h2>
    </div>
    <div class="thumb thumb-notes">
        @foreach ($lastNotes as $note)
        <div>
            <img class="thumbImage" src="./img/{{ $note->image }}" alt="{{ $note->name }}" />
            <h3>
                {{ $note->name }}
            </h3>
            <div>
                <?php
                    $maxLength = 150;
                    echo strlen($note->content)>$maxLength ? substr($note->content, 0, $maxLength).'...' : $note->content;
                ?>
            </div>
            <a href="/notes/{{ $note->id }}" title="{{ $note->name }}"></a>
        </div>
        @endforeach
    </div>
    <a class="button button-yellow" href="/notes" title="Voir toutes les notes">Voir toutes les notes</a>
</section>
<section>
    <div class="sectionTitle title-blue">
        <h2>Compétences les mieux maîtrisées :</h2>
    </div>
    <div class="thumb thumb-skills">
        @foreach ($topSkills as $skill)
            <div>
                <img class="thumbImage" src="./img/{{ $skill->image }}" alt="{{ $skill->name }}" />
                <h3>{{ $skill->name }}</h3>
                <div class="starsLine">
                @if ($skill->level == 1)
                    @for ($i = 0; $i < 1; $i++)
                        <img class="lightStar" src="./img/starFull.svg" />
                    @endfor
                    @for ($i = 0; $i < 4; $i++)
                        <img class="darkStar" src="./img/starEmpty.svg" />
                    @endfor
                @elseif($skill->level == 2)
                    @for ($i = 0; $i < 2; $i++)
                        <img class="lightStar" src="./img/starFull.svg" />
                    @endfor
                    @for ($i = 0; $i < 3; $i++)
                        <img class="darkStar" src="./img/starEmpty.svg" />
                    @endfor
                @elseif($skill->level == 3)
                    @for ($i = 0; $i < 3; $i++)
                        <img class="lightStar" src="./img/starFull.svg" />
                    @endfor
                    @for ($i = 0; $i < 2; $i++)
                        <img class="darkStar" src="./img/starEmpty.svg" />
                    @endfor
                @elseif($skill->level == 4)
                    @for ($i = 0; $i < 4; $i++)
                        <img class="lightStar" src="./img/starFull.svg" />
                    @endfor
                    @for ($i = 0; $i < 1; $i++)
                        <img class="darkStar" src="./img/starEmpty.svg" />
                    @endfor
                @elseif($skill->level == 5)
                    @for ($i = 0; $i < 5; $i++)
                        <img class="lightStar" src="./img/starFull.svg" />
                    @endfor
                @endif
                </div>
            </div>
        @endforeach
    </div>
    <a class="button button-blue" href="/skills" title="Voir toutes les compétences">Voir toutes les compétences</a>
</section>

@endsection