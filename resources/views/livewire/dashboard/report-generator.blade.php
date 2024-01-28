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
          <button onclick="openModal()" class="mt-2 flex items-center gap-2 rounded bg-primary py-3 px-4.5 font-medium text-white hover:bg-opacity-80">
              Generate New Report
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