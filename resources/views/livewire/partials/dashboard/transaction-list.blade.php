<div id="transactionList" class="outer-closer">
    <div class="modal-content">
        <div class="w-full flex justify-between items-center">
            <span class="fw-bold font-bold text-primary">
                <h2>Transactions</h2>
            </span>
            <span onclick="closeModal('transactionList')" class="rounded-full bg-danger text-white p-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                </svg>
            </span>
        </div>
        

        <div class="flex flex-col gap-10">
            <div class="rounded-sm bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
            
              <div class="max-w-full overflow-x-auto">
                <table class="w-full table-auto">
                  <thead>
                    <tr class="bg-gray-2 text-left dark:bg-meta-4">
                      <th
                        class="min-w-[220px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11"
                      >
                        Date
                      </th>
                      <th
                        class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white"
                      >
                        Amount
                      </th>
                      <th
                        class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white"
                      >
                        Revenue Stream
                      </th>
                      <th
                        class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white"
                      >
                        Status
                      </th>
                      <th class="py-4 px-4 font-medium text-black dark:text-white">
                        Actions
                      </th>
                    </tr>
                  </thead>
                  <tbody style="overflow: auto;">
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
                        
                          {{ $t->stream != null ? $t->stream->name : 'removed' }}
                        </td>
                        <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                          <p class="inline-flex rounded-full {{ $t->payment_status == 1 ? 'bg-success':'bg-danger' }}  bg-opacity-10 py-1 px-3 text-sm font-medium text-success">
                            {{ $t->payment_status == 1 ? 'Success':'Failed' }}
                          </p>
                        </td>
                        <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                          <p class="inline-flex rounded-full {{ $t->payment_status == 1 ? 'bg-success':'bg-danger' }}  bg-opacity-10 py-1 px-3 text-sm font-medium text-success">
                            --
                          </p>
                        </td>
                        <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                          <p class="inline-flex rounded-full {{ $t->payment_status == 1 ? 'bg-success':'bg-danger' }}  bg-opacity-10 py-1 px-3 text-sm font-medium text-success">
                            {{ $t->district != null ? $t->district->name : 'removed' }}
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

    </div>
</div>