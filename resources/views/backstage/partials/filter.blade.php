<div>
    <form class="flex justify-between" action="{{ route('backstage.games.index') }}">
        <input type="text" class="thunderbite-input mr-3" wire:model="filter1" placeholder="Account" value="{{ old('filter1') }}">
        <select class="thunderbite-input form-select mr-3" wire:model="filter2" placeholder="Prize">
            <option value="">Select Prize</option>
            @foreach($prizes as $prize)
                <option value="{{ $prize->id }}" {{ old('filter2') == $prize->id ? 'selected' : '' }}>{{ $prize->name }}</option>
            @endforeach
        </select>

        <input id="starts_at" autocomplete=off type="text" placeholder="Start Hour" class="thunderbite-input mr-3" wire:model="filter3">
        <input id="ends_at" autocomplete=off type="text"  placeholder="End Hour" class="thunderbite-input" wire:model="filter4">
    </form>
</div>
@push('js')
<script>

    const startsAt = flatpickr("#starts_at", {
        enableTime: true,
        noCalendar: true,
        enableMinutes: false,
        enableSeconds: false,
        dateFormat: "H",
        defaultHour: 00,
        // defaultMinute: 00,
        time_24hr: true,
    });

    const endsAt = flatpickr("#ends_at", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H",
        enableMinutes: false,
        enableSeconds: false,
        defaultHour: 23,
        // defaultMinute: 59,
        time_24hr: true,
    });

</script>
@endpush