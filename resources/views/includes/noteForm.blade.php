@csrf
<div>
<input type="text" class="textField @error('title') is-invalid @enderror" name="title" placeholder="Insérez un titre..." value="{{ old('title') ?? $note->title }}" />
    @error('title')
        <div class="errorMessage">
            {{ $errors->first('title') }}
        </div>
    @enderror
</div>
<div>
    <textarea class="textField @error('content') is-invalid @enderror" name="content" placeholder="Insérez du contenu...">{{ old('content') ?? $note->content }}</textarea>
    @error('content')
        <div class="errorMessage">
            {{ $errors->first('content') }}
        </div>
    @enderror
</div>
<div>
    <label for="imageUpload">Image :</label>
    <input id="imageUpload" class="@error('image') is-invalid @enderror" type="file" name="image" palceholder="Choisissez une image..." value="{{ old('image') ?? $note->image }}" />
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
            <option value="{{ $category->id }}" {{ old('category') == $category->id || $note->category == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
        @endforeach
    </select>
    @error('category')
        <div class="errorMessage">
            {{ $errors->first('category') }}
        </div>
    @enderror
</div>
<div class="extraMarginBottom">
    <label>Status : </label>
    <input class="@error('status') is-invalid @enderror" type="radio" id="active" name="status" value="1" {{ old('status') == '1' || $note->status == 'Actif' ? 'checked' : '' }} />
    <label class="radioButtonSpacing" for="active">Actif</label>
    <input class="@error('status') is-invalid @enderror" type="radio" id="inactive" name="status" value="0" {{ old('status') == '0' || $note->status == 'Inactif' ? 'checked' : '' }} />
    <label for="inactive">Inactif</label>
    @error('status')
        <div class="errorMessage">
            {{ $errors->first('status') }}
        </div>
    @enderror
</div>