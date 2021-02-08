<div>
    <label for="title">{{ __('Nome') }}:</label>
    <input id="title" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $image->name ?? old('name') }}" maxlength="140" required autofocus>
    @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('name') }}</strong></span>
    @endif
</div>

<div class="mt-3">
    <label for="body">{{ __('Descrição') }}:</label>
    <textarea id="body" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="6" maxlength="255" required>{{ $image->description ?? old('description') }}</textarea>
    @if ($errors->has('description'))
        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('description') }}</strong></span>
    @endif
</div>

<div class="mt-3">
    <label for="image">{{ __('Imagem de capa') }}:</label>
    <input id="image" type="file" class="form-control-file" name="image" value="{{ old('image') }}" accept="image/*">
    @if ($errors->has('image'))
        <span class="text-danger" role="alert"><strong>{{ $errors->first('image') }}</strong></span>
    @endif
</div>