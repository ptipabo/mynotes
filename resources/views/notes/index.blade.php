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
                        <img src="./img/logos/{{ $note->image }}" alt="{{ $note->title }}" />
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
                        <img id="optionsImage" src="./img/options.svg" alt="Editer" />
                        <ul class="hidden">
                            <li><a href="/notes/{{ $note->id }}/edit" title="Modifier">Modifier</a></li>
                            <li><a href="/notes" title="Supprimer">Supprimer</a></li>
                        </ul>
                        @include('notes.delete')
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
</section>

@endsection