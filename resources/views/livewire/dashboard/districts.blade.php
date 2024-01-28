<main>
    <div class="mx-auto max-w-screen-2xl md:p-6 2xl:p-10">
      <!-- Breadcrumb Start -->
      <div
        class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between"
      >
        <h2 class="text-title-md2 font-bold text-black dark:text-white">
          Districts
        </h2>

        <nav>
          <ol class="flex items-center gap-2">
            <li>
              <a class="font-medium" href="{{ route('dashboard') }}">Dashboard /</a>
            </li>
            <li class="font-medium text-primary">Districts</li>
          </ol>
        </nav>
      </div>
      <!-- Breadcrumb End -->

      <!-- ====== Table Section Start -->
      <div class="flex flex-col gap-10">
        <div class="w-full">
          <button onclick="openModal('newDistrictModal')" class="mt-2 flex items-center gap-2 rounded bg-primary py-3 px-4.5 font-medium text-white hover:bg-opacity-80">
              Add New
          </button>
        </div>
        
        @include('livewire.alerts.alerts')
        <div class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
          <div class="max-w-full overflow-x-auto">
            

          <table class="w-full table-auto">
          <thead>
            <tr class="bg-gray-2 text-left dark:bg-meta-4">
              <th
                class="min-w-[220px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11"
              >
                District
              </th>
              <th
                class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white"
              >
                Total Transctions
              </th>
              <th
                class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white"
              >
                Number of Revenue Streams
              </th>
              <th class="py-4 px-4 font-medium text-black dark:text-white">
                Actions
              </th>
            </tr>
          </thead>
          <tbody>
            @forelse ($districts as $d)<tr>
              <td class="font-bold fw-bold border-b border-[#eee] py-5 px-2 pl-9 dark:border-strokedark xl:pl-11">
                <h5 class="font-bold fw-bold  text-black dark:text-white"> {{ $d->name }} </h5>
                <p class="text-sm">Lusaka</p>
              </td>

              <td class="border-b border-[#eee] py-5 px-2 pl-9 dark:border-strokedark xl:pl-11">
                <h5 class="font-bold fw-bold text-black dark:text-white">K{{ $d->transacts->sum('total_amount') }}</h5>
                <p class="text-sm"> {{ $d->transacts->count() }} Transaction(s)</p>
              </td>

              <td class="border-b border-[#eee] py-5 px-2 dark:border-strokedark">
                <p class="inline-flex rounded-full bg-success bg-opacity-10 py-1 px-3 text-sm font-medium text-success">
                  --
                </p>
              </td>

              <td class="border-b border-[#eee] py-5 px-2 dark:border-strokedark">
                <div class="flex items-center space-x-3.5">
                  <button class="hover:text-primary flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-map" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.5.5 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103M10 1.91l-4-.8v12.98l4 .8zm1 12.98 4-.8V1.11l-4 .8zm-6-.8V1.11l-4 .8v12.98z"/>
                    </svg>
                  </button>
                  <button wire:click="delete({{$d->id}})" class="hover:text-primary text-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                      <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                    </svg>
                  </button>

                </div>
              </td>
            </tr>
            @empty
            @endforelse
          </tbody>
          </table>
          </div>
          </div>
        <!-- ====== Table Three End -->
      </div>
      <!-- ====== Table Section End -->
    </div>
    @include('livewire.partials.districts.new-modal')
  </main>
