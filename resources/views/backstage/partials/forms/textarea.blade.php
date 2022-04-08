<div class="grid grid-cols-4 gap-4 items-start pt-5">
    <label for="{{ $field }}" class="thunderbite-label">
        {{ $label }}
    </label>

    <div class="col-span-3">
        @if(! empty($disabled))
            <div class="thunderbite-input-trix disabled">{!! $value  !!}</div>
        @else
            {{-- <input id="{{ $field }}" type="hidden" value="{{ $value }}" name="{{ $field }}">
            <trix-editor class="thunderbite-input-trix @error($field) is-invalid @enderror" input="{{ $field }}">{{ $value }}</trix-editor> --}}
            <textarea name="{{ $field }}" id="{{ $field }}" class="thunderbite-textarea  @if(! empty($disabled)) disabled @endif   @error($field) is-invalid @enderror" cols="30" rows="10">{{ $value }}</textarea>
        @endif

        @error($field)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
