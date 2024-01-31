<main>
    <div class="mx-auto max-w-screen-2xl md:p-6 2xl:p-10">
      <!-- Breadcrumb Start -->
      <div
        class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between"
      >
        <h2 class="text-title-md2 font-bold text-black dark:text-white">
          {{ ucwords($report_type) }} Report
        </h2>

        <nav>
          <ol class="flex items-center gap-2">
            <li>
              <a class="font-medium" href="{{ route('dashboard') }}">Dashboard /</a>
            </li>
            <li class="font-medium text-primary">Transactions</li>
          </ol>
        </nav>
      </div>
      <div class="w-full flex justify-between items-center">
          <button onclick="openModal('reportSearchModal')" class="mt-2 flex items-center gap-2 rounded bg-primary py-3 px-4.5 font-medium text-white hover:bg-opacity-80">
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-data" viewBox="0 0 16 16">
                <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5z"/>
                <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5z"/>
                <path d="M10 7a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 0-1 1v3a1 1 0 1 0 2 0V9a1 1 0 0 0-1-1"/>
              </svg>
            </span>
            
            Generate Report
          </button>

          <div class="flex">
            <span class="fw-bold font-bold text-black">From: <span class="text-warning">{{$from_date}}</span> To: <span class="text-warning">{{$to_date}}</span> </span>
          </div>
      </div>
      <!-- Breadcrumb End -->
        {{-- <div wire:loading>
            Loading data, please wait...
        </div> --}}
      @include('livewire.partials.transactions.generator')
      @switch($display)
            @case('table')
                @include('livewire.partials.reports.table-result-view')
            @break
            @case('bar')
                @include('livewire.partials.reports.bar-chart-result-view')
            @break
            @case('pie')
                @include('livewire.partials.reports.pie-chart-result-view')
            @break
            @default
      @endswitch
    </div>
  </main>