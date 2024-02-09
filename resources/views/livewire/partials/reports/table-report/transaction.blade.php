<div class="flex flex-col gap-10 mt-2">
  <div class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
      <div class="max-w-full overflow-x-auto">
          <table id="report_transactions" class="w-full table-auto">
              <thead>
                  <tr class="bg-gray-2 text-left dark:bg-meta-4">
                      <th class="min-w-[100px] py-4 px-4 font-medium text-black dark:text-white"> 
                        Date
                      </th>
                      <th class="min-w-[100px] py-4 px-4  font-medium text-black dark:text-white xl:pl-11"> 
                        Transaction ID
                      </th>
                      <th class="min-w-[100px] py-4 px-4 font-medium text-black dark:text-white">
                        Amount
                      </th>
                      <th class="min-w-[120px] py-4 px-4  font-medium text-black dark:text-white"> 
                        Revenue Stream
                      </th>
                      <th class="min-w-[100px] py-4 px-4 font-medium text-black dark:text-white">
                        Machine ID
                      </th>
                      {{-- <th class="min-w-[90px] py-4 px-4 font-medium text-black dark:text-white">
                        Status
                      </th> --}}
                      <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
                        Receipt No.
                      </th>
                      <th class="py-4 px-4 font-medium text-black dark:text-white">
                        Actions
                      </th>
                  </tr>
              </thead>
              <tbody>
                  @php
                      $grandTotalAmount = 0;
                      $grandTotalTransactions = 0;
                  @endphp

                  @forelse ($transactions as $t)
                      <tr>
                          <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                            {{ (new DateTime($t->created_at))->format('F j, Y g:i A') }}
                          </td>
                          <td class="border-b border-[#eee] py-5 px-12 dark:border-strokedark">
                              <p class="inline-flex rounded-full bg-primary bg-opacity-10 py-1 px-3 text-sm font-medium text-dark">
                                  {{ $t->id }}
                              </p>
                          </td>
                          <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                              @php
                                  $totalAmount = $t->total_amount;
                                  $grandTotalAmount += $totalAmount;
                              @endphp
                              <h5 class="font-bold text-black fw-bold dark:text-white">
                                  K {{ $totalAmount }}
                              </h5>
                          </td>
                          <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                              <p class="inline-flex rounded-full bg-opacity-10 py-1 px-3 text-sm font-bold text-dark">
                                  {{ $t->stream->name }}
                              </p>
                          </td>
                          <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                              <p class="inline-flex rounded-full bg-opacity-10 py-1 px-3 text-sm font-medium text-success">
                                {{$t->machine_id ?? $t->terminal_id}}
                              </p>
                          </td>
                          {{-- <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                              <p class="inline-flex rounded-full {{ $t->payment_status == 1 ? 'bg-success text-success':'bg-danger text-danger' }}  bg-opacity-10 py-1 px-3 text-sm font-medium">
                                  {{ $t->payment_status == 1 ? 'Success':'Failed' }}
                              </p>
                          </td> --}}
                          <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                              <a href="#" class="inline-flex rounded-full {{ $t->payment_status == 1 ? 'bg-success text-success':'bg-danger text-danger' }}  bg-opacity-10 py-1 px-3 text-sm font-medium ">
                                  {{ $t->receipt != null ? $t->receipt->receipt_number : '--' }}
                              </a>
                          </td>
                          <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                              <div class="flex items-center space-x-3.5">
                                  <a href="{{ route('details', $t->id) }}" class="hover:text-primary">
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
                                  </a>
                              </div>
                          </td>
                      </tr>
                  @empty
                      {{-- Handle empty transactions --}}
                  @endforelse
              </tbody>
              <tfoot>
                  <tr>
                      <td class="font-bold fs-3">GRAND TOTAL</td>
                      <td></td>
                      <td class="font-bold fs-3">K {{ (float)$grandTotalAmount }}</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
              </tfoot>
          </table>
      </div>
  </div>
</div>
