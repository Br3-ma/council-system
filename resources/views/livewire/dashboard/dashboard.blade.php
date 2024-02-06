<main wire:poll.100='poll()'>
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        @include('livewire.partials.dashboard.stats')
        <div class="mt-4 grid grid-cols-12 gap-4 md:mt-6 md:gap-6 2xl:mt-7.5 2xl:gap-7.5">
            @include('livewire.partials.dashboard.collection-trend-chart')
            @include('livewire.partials.dashboard.collection-trend2-chart')
            @include('livewire.partials.dashboard.total-collection-stream-chart')
            <div class="col-span-12 flex gap-8">
                @include('livewire.partials.dashboard.total-collections-districts-chart')
                @include('livewire.partials.dashboard.total-collections-chart-breakdown')
            </div>
            {{-- @include('livewire.partials.dashboard.collections-streams-chart') --}}
            {{-- @include('livewire.partials.dashboard.recent-transactions') --}}
        </div>
    </div>

    @include('livewire.partials.dashboard.transaction-list')
    @include('livewire.partials.dashboard.revenue-streams')
    @include('livewire.partials.dashboard.today-collections')
</main> 


