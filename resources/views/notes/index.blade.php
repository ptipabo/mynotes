@extends('layout')

@section('content')

<section class="pageTitle">
    <h1>Notes</h1>
</section>
<section>
    <a class="button button-yellow" href="/notes/create">Ajouter une note</a>
</section>
<section>
    <div>
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Titre</th>
                <th>Contenu</th>
                <th>Catégorie</th>
                <th>Editer</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notes as $note)
                <tr>
                    <?php $elementLink = '<a href="/notes/'.$note->id.'" title="'.$note->title.'">'; ?>
                    <td class="tableRowLink">
                        <img src="./storage/logos/{{ $note->image }}" alt="{{ $note->title }}" />
                        <?php echo $elementLink; ?>
                    </td>
                    <td class="tableRowLink">
                        <h3>
                            {{ $note->title }}
                        </h3>
                        <?php echo $elementLink; ?>
                    </td>
                    <td class="tableRowLink tableTextCell">
                        <p>
                            <?php
                                $maxLength = 150;
                                echo strlen(strip_tags($note->content))>$maxLength ? substr(strip_tags($note->content), 0, $maxLength).'...' : strip_tags($note->content);
                            ?>
                        </p>
                        <?php echo $elementLink; ?>
                    </td>
                    <td class="tableRowLink">
                        @foreach ($categories as $category)
                            @if ($note->category == $category->id)
                                {{ $category->title }}
                            @endif
                        @endforeach
                        <?php echo $elementLink; ?>
                    </td>
                    <td class="tableEditCell">
                        <img id="actionsImage_{{ $note->id }}" class="actionsImage" src="./img/options.svg" alt="Editer" />
                        <div id="elementNumber{{ $note->id }}" class="actionsMenu hidden">
                            <ul>
                                <li><a href="/notes/{{ $note->id }}/edit" title="Modifier">Modifier</a></li>
                                <li id="deleteLink_{{ $note->id }}" class="deleteLink" title="Supprimer">Supprimer</li>
                            </ul>
                        </div>
                        <div id="deleteForm{{ $note->id }}" class="deleteForm hidden">
                            <div>
                                <img src="./img/warning.svg" alt="Attention!" />
                                <p>Cette action est définitive et irréversible, êtes-vous sûr de vouloir supprimer cette note?</p>
                                <form action="notes/{{ $note->id }}" method="POST">
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