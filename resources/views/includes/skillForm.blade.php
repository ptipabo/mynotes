@csrf
<div>
<input type="text" class="textField @error('title') is-invalid @enderror" name="title" placeholder="Insérez un titre..." value="{{ old('title') ?? $skill->title }}" />
    @error('title')
        <div class="errorMessage">
            {{ $errors->first('title') }}
        </div>
    @enderror
</div>
<div>
    <label for="levelSelect">Niveau :</label>
    <select class="@error('level') is-invalid @enderror" name="level" id="levelSelect">
        @foreach($levels as $level)
            <option value="{{ $level[0] }}" {{ $skill->level == $level[0] ? 'selected' : '' }}>{{ $level[1] }}</option>
        @endforeach
    </select>
    @error('level')
        <div class="errorMessage">
            {{ $errors->first('level') }}
        </div>
    @enderror
</div>
<div>
    <label for="imageUpload">Image :</label>
    <input id="imageUpload" class="@error('image') is-invalid @enderror" type="file" name="image" palceholder="Choisissez une image..." value="{{ old('image') ?? $skill->image }}" />
    @error('image')
        <div class="errorMessage">
            {{ $errors->first('image') }}
        </div>
    @enderror
</div>
<input type="hidden" name="user" value="1" />