@extends('layout')

@section('content')

<section class="pageTitle">
    <h1>Créer une nouvelle note</h1>
</section>
<section>
    <form action="/notes" method="POST">
        @csrf
        <div>
            <input type="text" class="@error('name') is-invalid @enderror" name="name" placeholder="Insérez un titre..." />
            @error('name')
                <div class="errorMessage">
                    {{ $errors->first('name') }}
                </div>
            @enderror
        </div>
        <div>
            <textarea class="@error('content') is-invalid @enderror" name="content" placeholder="Insérez du contenu..."></textarea>
            @error('content')
                <div class="errorMessage">
                    {{ $errors->first('content') }}
                </div>
            @enderror
        </div>
        <div>
            <input class="@error('image') is-invalid @enderror" type="file" name="image" palceholder="Choisissez une image..." />
            @error('image')
                <div class="errorMessage">
                    {{ $errors->first('image') }}
                </div>
            @enderror
        </div>
        <div>
            <label for="categorySelect">Catégorie :</label>
            <select class="@error('category') is-invalid @enderror" name="category" id="categorySelect">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            @error('category')
                <div class="errorMessage">
                    {{ $errors->first('category') }}
                </div>
            @enderror
        </div>
        <div>
            <input class="@error('status') is-invalid @enderror" type="radio" id="active" name="status" value="1" />
            <label for="active">Active</label>
            <input class="@error('status') is-invalid @enderror" type="radio" id="inactive" name="status" value="0" />
            <label for="inactive">Inactive</label>
            @error('status')
                <div class="errorMessage">
                    {{ $errors->first('status') }}
                </div>
            @enderror
        </div>
        <button type="submit">Créer cette note</button>
    </form>
</section>

@endsection