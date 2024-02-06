<div class="flex flex-col gap-10 mt-2">
    <div class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
        <div class="max-w-full overflow-x-auto">
            <table id="report_transactions" class="w-full table-auto">
            <thead>
                <tr class="bg-gray-2 text-left dark:bg-meta-4">
                  <th class="min-w-[120px] py-4 px-4 text-sm font-medium text-black dark:text-white"> 
                      Date
                  </th>
                    <th class="min-w-[120px] py-4 px-4 text-sm font-medium text-black dark:text-white xl:pl-11"> 
                        Transaction ID
                    </th>
                    <th class="min-w-[100px] py-4 px-4 text-sm font-medium text-black dark:text-white"> 
                        Revenue Stream
                    </th>
                    <th class="min-w-[120px] py-4 px-4 text-sm font-medium text-black dark:text-white">
                        Location
                    </th>
                    <th class="min-w-[90px] py-4 px-4 text-sm font-medium text-black dark:text-white">
                        Status
                    </th>
                    <th class="min-w-[120px] py-4 px-4 text-sm font-medium text-black dark:text-white">
                        Receipt No.
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transactions as $t)
                  <tr>
                    <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                      {{ $t->created_at->toFormattedDateString() }}
                    </td>
                    <td class="border-b border-[#eee] py-5 px-12 dark:border-strokedark">
                      <p class="inline-flex rounded-full bg-primary bg-opacity-10 py-1 px-3 text-sm font-medium text-dark">
                          {{ $t->id }}
                      </p>
                    </td>
                    <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                      <p class="inline-flex rounded-full bg-primary bg-opacity-10 py-1 px-3 text-sm font-medium text-dark">
                      {{ $t->stream->name }}
                      </p>
                    </td>
                    <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                      <p class="inline-flex rounded-full bg-primary bg-opacity-10 py-1 px-3 text-sm font-medium text-dark">
                        {{ $t->district != null ? $t->district->name : '' }}
                      </p>
                    </td>
                    <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                      <p class="inline-flex rounded-full {{ $t->payment_status == 1 ? 'bg-success text-success':'bg-danger text-danger' }}  bg-opacity-10 py-1 px-3 text-sm font-medium">
                        {{ $t->payment_status == 1 ? 'Success':'Failed' }}
                      </p>
                    </td>
                    <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                      <a href="#" class="inline-flex rounded-full {{ $t->payment_status == 1 ? 'bg-success text-success':'bg-danger text-danger' }}  bg-opacity-10 py-1 px-3 text-sm font-medium ">
                        {{ $t->receipt != null ? $t->receipt->receipt_number : '--' }}
                      </a>
                    </td>
                  </tr>
                @empty
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>