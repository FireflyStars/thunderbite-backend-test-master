<div class="grid grid-cols-4 gap-4 items-start pt-5">
    <label for="{{ $field }}" class="thunderbite-label">
        {{ $label }} 
    </label>

    <div class="col-span-3">
        <span x-data="{ value: {{ $value }}, toggle() { this.value = !this.value } }" :class="{ 'bg-gray-200': !value, '{{ empty($disabled) ?  'bg-toggle-success' : 'bg-gray-300' }}': value }" class="relative inline-block flex-shrink-0 h-9 w-16 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none" role="checkbox" tabindex="0" @empty($disabled) @click="toggle()" @endempty @keydown.space.prevent="toggle()">
            <span aria-hidden="true" :class="{ 'translate-x-7': value, 'translate-x-0': !value }" class="inline-block h-8 w-8 rounded-full bg-white shadow transform transition ease-in-out duration-200"></span>
            <input id="{{ $field }}" type="hidden" name="{{ $field }}" x-model="value">
        </span>

        @error($field)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
