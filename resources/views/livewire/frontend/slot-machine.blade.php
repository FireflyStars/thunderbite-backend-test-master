<div class="py-12 bg-white">
    <div class="w-[42rem] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:text-center">
            <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Slot Machine</h2>
        </div>
        <div class="mt-10 flex">
            <div class="w-[21rem] h-[11rem]">
                <div class="grid grid-rows-3 grid-cols-5 gap-4">
                    @if (count($board) > 0)
                        @foreach ($board as $item)
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white uppercase {{ isset($item['class']) ? $item['class'] : '' }}">
                                @if (isset($item['image']))
                                    <img src="{{ asset($item['image']) }}" class="w-full" alt="{{ $item['name'] }}">
                                @else
                                    {{ $item['name'] }}
                                @endif
                            </div>
                        @endforeach
                    @else
                        @for ($i = 0; $i < 15; $i++)
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white uppercase">
                                X
                            </div>
                        @endfor
                    @endif
                </div>
                <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-center">
                    <div class="rounded-md shadow">
                        <a href="#" wire:click="spinSlotMachine" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 md:py-4 md:text-lg md:px-10"> Spin ({{ $spin_limit }})</a>
                    </div>
                </div>
            </div>
            <div class="w-[21rem] px-4">
                <h3 class="h3">Points: {{ $total_points }}</h3>
                <h3 class="h3">Matches</h3>
                @foreach ($matched_paylines as $item)
                    <p>{{ $item['symbol'] }} : {{ $item['points'] }}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>
@push('js')
<script>
    window.livewire.on('outOfSpins', ()=>{
        swal({
            title: "You run out of spins",
            // text: "You can do tomorrow again",
            icon: "info",
        });
    });
</script>
@endpush