@extends('layout')

@section('content')

<section class="pageTitle">
    <h1>Compétences</h1>
</section>
<section>
    <a class="button button-blue" href="/skills/create">Ajouter une compétence</a>
</section>
<section>
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Compétence</th>
                <th>Niveau de maitrise</th>
                <th>Conseils d'amélioration</th>
                <th>Editer</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($skills as $skill)
                <tr>
                    <td>
                        <img src="./img/logos/{{ $skill->image }}" alt="{{ $skill->title }}" />
                    </td>
                    <td>
                        {{ $skill->title }}
                    </td>
                    <td>
                        @for ($i = 0; $i < $skill->level; $i++)
                            <img class="lightStar" src="./img/starFull.svg" />
                        @endfor
                        @for ($i = 0; $i < (5-$skill->level); $i++)
                            <img class="darkStar" src="./img/starEmpty.svg" />
                        @endfor
                    </td>
                    @if($skill->level == 1)
                        <td>
                            {{ $advices[0] }}
                        </td>
                    @elseif($skill->level == 2)
                        <td>
                            {{ $advices[1] }}
                        </td>
                    @elseif($skill->level == 3)
                        <td>
                            {{ $advices[2] }}
                        </td>
                    @elseif($skill->level == 4)
                        <td>
                            {{ $advices[3] }}
                        </td>
                    @else
                        <td>
                            {{ $advices[4] }}
                        </td>
                    @endif
                    <td class="tableEditCell">
                        <img id="optionsImage" src="./img/options.svg" alt="Editer" />
                        <ul class="hidden">
                            <li><a href="/skills/{{ $skill->id }}/edit" title="Modifier">Modifier</a></li>
                            <li><a href="/skills" title="Supprimer">Supprimer</a></li>
                        </ul>
                        @include('skills.delete')
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>

@endsection