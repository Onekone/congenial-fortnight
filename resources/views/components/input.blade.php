<div class="form-group">
    <label for="login">{{ $tooltip }}</label>
    <input type="{{ $type ?? 'text' }}" class="form-control {{ $errors->has($id) ? ' is-invalid' : '' }}" id="{{ $id }}"
           name="{{ $id }}" aria-describedby="{{ $id }}Help" placeholder="{{ $placeholder ?? '' }}"
           value="{{ old($id) ?? $value ?? null }}">


    @error($id)
    <small id="loginError" class="form-text text-muted">{{ $errors->first($id) }}</small>
    @else
        @if($help ?? false)
            <small id="{{ $id }}Help" class="form-text text-muted">{{$help}}</small>
        @endif
        @enderror
</div>