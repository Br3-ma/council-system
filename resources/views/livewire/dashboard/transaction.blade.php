<main>
    <div class="mx-auto max-w-screen-2xl md:p-6 2xl:p-10">
      
      <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-bold text-black dark:text-white">
          Transactions
        </h2>

        <nav>
          <ol class="flex items-center gap-2">
            <li>
              <a class="font-medium" href="{{ route('dashboard') }}">Dashboard /</a>
            </li>
            <li class="font-medium text-primary">Collections</li>
          </ol>
        </nav>
      </div>

      <div class="w-full flex items-center justify-end">
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
      </div> 


      <div class="flex flex-col gap-10 mt-2">
        <div class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
          <div class="max-w-full overflow-x-auto">
            <table id="main_transations" class="w-full table-auto">
              <thead>
                <tr class="bg-gray-2 text-left dark:bg-meta-4">
                  <th class="min-w-[110px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
                    Date
                  </th>
                  <th class="min-w-[100px] py-4 px-4 font-medium text-black dark:text-white">
                    Amount
                  </th>
                  <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
                    Revenue Stream
                  </th>
                  <th class="min-w-[80px] py-4 px-4 font-medium text-black dark:text-white">
                    Status
                  </th>
                  <th class="min-w-[100px] py-4 px-4 font-medium text-black dark:text-white">
                    Machine ID
                  </th>
                  <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
                    Location
                  </th>
                  <th class="py-4 px-4 font-medium text-black dark:text-white">
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody>
                @forelse ($transactions as $t)
                <tr>
                  <td class="border-b border-[#eee] py-5 px-4 pl-9 dark:border-strokedark xl:pl-11">
                    <p class="text-black dark:text-white">{{ $t->created_at->toFormattedDateString() }}</p>
                  </td>
                  <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                    <h5 class="font-bold text-black fw-bold dark:text-white">
                      K {{ $t->total_amount }}
                    </h5>
                    
                  </td>
                  <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                    <p class="inline-flex rounded-full bg-primary bg-opacity-10 py-1 px-3 text-sm font-medium text-dark">
                  
                    {{ $t->stream != null ? $t->stream->name : '' }}
                    </p>
                  </td>
                  <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                    <p class="inline-flex rounded-full {{ $t->payment_status == 1 ? 'bg-success':'bg-danger' }}  bg-opacity-10 py-1 px-3 text-sm font-medium text-success">
                      {{ $t->payment_status == 1 ? 'Success':'Failed' }}
                    </p>
                  </td>
                  <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                    <p class="inline-flex rounded-full {{ $t->payment_status == 1 ? 'bg-success':'bg-danger' }}  bg-opacity-10 py-1 px-3 text-sm font-medium text-success">
                      {{$t->terminal_id}}
                    </p>
                  </td>
                  <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                    <p class="inline-flex rounded-full {{ $t->payment_status == 1 ? 'bg-success':'bg-danger' }}  bg-opacity-10 py-1 px-3 text-sm font-medium text-success">
                      {{ $t->district != null ? $t->district->name : '' }}
                    </p>
                  </td>
                  <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                    <div class="flex items-center space-x-3.5">
                      <button class="hover:text-primary">
                        <svg
                          class="fill-current"
                          width="18"
                          height="18"
                          viewBox="0 0 18 18"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M8.99981 14.8219C3.43106 14.8219 0.674805 9.50624 0.562305 9.28124C0.47793 9.11249 0.47793 8.88749 0.562305 8.71874C0.674805 8.49374 3.43106 3.20624 8.99981 3.20624C14.5686 3.20624 17.3248 8.49374 17.4373 8.71874C17.5217 8.88749 17.5217 9.11249 17.4373 9.28124C17.3248 9.50624 14.5686 14.8219 8.99981 14.8219ZM1.85605 8.99999C2.4748 10.0406 4.89356 13.5562 8.99981 13.5562C13.1061 13.5562 15.5248 10.0406 16.1436 8.99999C15.5248 7.95936 13.1061 4.44374 8.99981 4.44374C4.89356 4.44374 2.4748 7.95936 1.85605 8.99999Z"
                            fill=""
                          />
                          <path
                            d="M9 11.3906C7.67812 11.3906 6.60938 10.3219 6.60938 9C6.60938 7.67813 7.67812 6.60938 9 6.60938C10.3219 6.60938 11.3906 7.67813 11.3906 9C11.3906 10.3219 10.3219 11.3906 9 11.3906ZM9 7.875C8.38125 7.875 7.875 8.38125 7.875 9C7.875 9.61875 8.38125 10.125 9 10.125C9.61875 10.125 10.125 9.61875 10.125 9C10.125 8.38125 9.61875 7.875 9 7.875Z"
                            fill=""
                          />
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
      </div>
    </div>
    @include('livewire.partials.transactions.generator')
</main>