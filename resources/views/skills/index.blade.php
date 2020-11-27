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
                        <img src="./storage/logos/{{ $skill->image }}" alt="{{ $skill->title }}" />
                    </td>
                    <td>
                        {{ $skill->title }}
                    </td>
                    <td class="w-180">
                    <div class="starsLine" title="{{ $levels[$skill->level-1] }}">
                            @for ($i = 0; $i < $skill->level; $i++)
                                <img class="lightStar" src="./img/starFull.svg" />
                            @endfor
                            @for ($i = 0; $i < (5-$skill->level); $i++)
                                <img class="darkStar" src="./img/starEmpty.svg" />
                            @endfor
                        </div>
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
                        <img id="actionsImage_{{ $skill->id }}" class="actionsImage" src="./img/options.svg" alt="Editer" />
                        <div id="elementNumber{{ $skill->id }}" class="actionsMenu hidden">
                            <ul>
                                <li><a href="/skills/{{ $skill->id }}/edit" title="Modifier">Modifier</a></li>
                                <li id="deleteLink_{{ $skill->id }}" class="deleteLink" title="Supprimer">Supprimer</li>
                            </ul>
                        </div>
                        <div id="deleteForm{{ $skill->id }}" class="deleteForm hidden">
                            <div>
                                <img src="./img/warning.svg" alt="Attention!" />
                                <p>Cette action est définitive et irréversible, êtes-vous sûr de vouloir supprimer cette compétence?</p>
                                <form action="skills/{{ $skill->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <p class="cancelButton button button-grey">Annuler</p>
                                    <button class="button button-red" type="submit">Confirmer la suppression</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>

@endsection