<div class="grid grid-cols-4 gap-4 items-start pt-5">
    <label for="starts_at" class="thunderbite-label">
        Starts at
    </label>

    <div class="col-span-3">
        <input @if(! empty($disabled)) disabled @endif id="starts_at" autocomplete=off type="text" class="thunderbite-input @if(! empty($disabled))  disabled @endif @error('starts_at') is-invalid @enderror" name="starts_at" value="{{ $starts_at }}">

        @error('starts_at')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="grid grid-cols-4 gap-4 items-start pt-5">
    <label for="ends_at" class="thunderbite-label">
        Ends at
    </label>

    <div class="col-span-3">
        <input @if(! empty($disabled))  disabled @endif id="ends_at" autocomplete=off type="text" class="thunderbite-input @if(! empty($disabled)) disabled @endif @error('ends_at') is-invalid @enderror" name="ends_at" value="{{ $ends_at }}">

        @error('ends_at')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

@push('js')
    <script>

        const startsAt = flatpickr("#starts_at", {
            allowInput: true,
            enableSeconds: true,
            dateFormat: 'd-m-Y H:i:S',
            defaultHour: 00,
            defaultMinute: 00,
            defaultSeconds: 00,
            enableTime: true,
            time_24hr: true,
            @if( isset($minDate) ) minDate: '{{ $minDate->format('d-m-Y') }}', @endif
            @if( isset($maxDate) ) maxDate: '{{ $maxDate->format('d-m-Y') }}', @endif
        });

        const endsAt = flatpickr("#ends_at", {
            allowInput: true,
            enableSeconds: true,
            dateFormat: 'd-m-Y H:i:S',
            defaultHour: 23,
            defaultMinute: 59,
            defaultSeconds: 59,
            enableTime: true,
            time_24hr: true,
            @if( isset($minDate) ) minDate: '{{ $minDate->format('d-m-Y') }}', @endif
            @if( isset($maxDate) ) maxDate: '{{ $maxDate->format('d-m-Y') }}', @endif
        });

    </script>
@endpush
