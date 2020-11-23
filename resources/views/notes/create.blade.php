@extends('layout')

@section('content')

<section class="pageTitle">
    <h1>Créer une nouvelle note</h1>
</section>
<section>
    <form action="/notes" method="POST">
        @csrf
        <div>
            <input type="text" name="name" placeholder="Insérez un titre..." />
        </div>
        <div>
            <textarea name="content" placeholder="Insérez du contenu..."></textarea>
        </div>
        <div>
            <label for="categorySelect">Catégorie :</label>
            <select name="category" id="categorySelect">
                <option value="1">Frameworks</option>
                <option value="2">CMS</option>
            </select>
        </div>
        <div>
            <input type="radio" id="active" name="status" value="1" />
            <label for="active">Active</label>
            <input type="radio" id="inactive" name="status" value="0" />
            <label for="inactive">Inactive</label>
        </div>
        <button type="submit">Créer cette note</button>
    </form>
</section>

@endsection