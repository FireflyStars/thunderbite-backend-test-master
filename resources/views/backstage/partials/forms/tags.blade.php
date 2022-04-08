<div class="grid grid-cols-4 gap-4 items-start pt-5">
    <label for="{{ $field }}" class="thunderbite-label">
        {{ $label }}
    </label>

    <div class="col-span-3">
        <select @if(! empty($disabled)) disabled @endif id="{{ $field }}" class="thunderbite-input form-select @if(! empty($disabled)) disabled @endif @error($field) is-invalid @enderror" name="{{ $field }}[]" multiple="multiple">
            @foreach($options as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ $values && in_array($optionKey, $values) ? 'selected' : '' }}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @error($field)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>



@push('js')
    <script>
        $("#{{ $field }}").select2({
            maximumInputLength: 20,
            maximumSelectionLength: 20,
            multiple: true,
            placeholder: "Select {{ $label }}",
            tags: true,
            theme: 'default @error($field) is-invalid @enderror @if(! empty($disabled)) disabled @endif'
        });
    </script>
@endpush