<div class="flex flex-col gap-10 mt-2">
    <div class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
        <div class="max-w-full overflow-x-auto">
            <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-2 text-left dark:bg-meta-4">
                  <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
                    Revenue Stream
                  </th>
                  <th class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white">
                    Total Amount
                  </th>
                  <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
                    Number of Trasactions
                  </th>
                </tr>
            </thead>
            <tbody>
              {{-- @dd($transactions) --}}
                @forelse ($transactions as $t)
                <tr>
                  <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                    <p class="inline-flex rounded-full bg-primary bg-opacity-10 py-1 px-3 text-sm font-medium text-dark">
                      {{ $t->name }}
                    </p>
                  </td>
                  <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                    <p class="text-sm font-bold fw-bold text-primary">
                      K {{ $t->transacts->sum('total_amount') }}
                    </p>
                  </td>
                  <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                    <p class="inline-flex rounded-full {{ $t->status == 1 ? 'bg-success':'bg-danger' }}  bg-opacity-10 py-1 px-3 text-sm font-medium text-dark">
                      {{ $t->transacts->count() }}
                    </p>
                  </td>
                  
                </tr>
                @empty
                    
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>