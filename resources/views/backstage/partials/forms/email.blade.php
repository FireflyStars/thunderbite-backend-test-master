<div class="grid grid-cols-4 gap-4 items-start pt-5">
    <label for="{{ $field }}" class="thunderbite-label">
        {{ $label }}
    </label>

    <div class="col-span-3">
        <input id="{{ $field }}" @if(! empty($disabled)) disabled @endif type="email" class="thunderbite-input @if(! empty($disabled)) disabled @endif @error($field) is-invalid @enderror" name="email" value="{{ $value }}">

        @error($field)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
