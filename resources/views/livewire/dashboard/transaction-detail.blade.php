<main class="u-min-h-screen">
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
      <!-- Breadcrumb Start -->
      <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-bold text-black dark:text-white">
          Reciept Details
        </h2>

        <nav>
          <ol class="flex items-center gap-2">
            <li>
              <a class="font-medium" href="{{ route('transactions') }}">Transactions /</a>
            </li>
            <li class="font-medium text-primary">Reciept</li>
          </ol>
        </nav>
      </div>
      <!-- Breadcrumb End -->

      <!-- ====== Invoice Section Start -->
      <div class="rounded-sm border border-stroke bg-white p-4 shadow-default dark:border-strokedark dark:bg-boxdark md:p-6 xl:p-9">
        <div class="flex flex-col-reverse gap-5 xl:flex-row xl:justify-between">
          <div class="flex flex-col gap-4 sm:flex-row xl:gap-9">
            <div>
              <p class="mb-1.5 text-lg font-medium text-black dark:text-white">
                From
              </p>
              <h4 class="mb-4 text-2xl font-medium text-black dark:text-white">
                Nakonde Town Council
              </h4>
              <a href="mailto:nakondetowncouncil.ntc@gmail.com" class="block">nakondetowncouncil.ntc@gmail.com</a>
              <span class="mt-2 block">P.0. Box 430083 Nakonde.</span>
              <span class="mt-2 block">+260 977 415 186</span>
              <span class="mt-2 block">+260 967 415 186</span>
              <span class="mt-2 block">+260 957 700 001</span>
            </div>
            <div>
              <p class="mb-1.5 text-lg font-medium text-black dark:text-white">
                Information
              </p>
              <h4 class="mb-4 text-2xl font-medium text-black dark:text-white">
                {{$collection->streams !== null ?  $collection->streams->type : '' }}
              </h4>
                <a href="#" class="block">
                    <span class="font-medium">Machine ID:</span>
                    {{ $collection->machine_id }}
                </a>
                <span class="mt-2 block"><span class="font-medium">Transaction#:</span>  {{ $collection->id }}
                </span>
                <span class="mt-2 block"><span class="font-medium">Date:</span>  {{ $collection->created_at }}
                </span>
                @if($collection->category == 'Penalty Fee')
                  <span class="flex items-center gap-2 rounded mt-2 block badge badge-danger p-2 bg-danger text-white font-bold"><span class="font-medium"></span> 
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-diamond" viewBox="0 0 16 16">
                    <path d="M6.95.435c.58-.58 1.52-.58 2.1 0l6.515 6.516c.58.58.58 1.519 0 2.098L9.05 15.565c-.58.58-1.519.58-2.098 0L.435 9.05a1.48 1.48 0 0 1 0-2.098zm1.4.7a.495.495 0 0 0-.7 0L1.134 7.65a.495.495 0 0 0 0 .7l6.516 6.516a.495.495 0 0 0 .7 0l6.516-6.516a.495.495 0 0 0 0-.7L8.35 1.134z"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                  </svg>  
                  Penalty Payment
                  </span>
                @endif
                
            </div>
          </div>
          <h3 class="text-2xl font-medium text-black dark:text-white">
            Receipt #{{ $collection->receipt != null ? $collection->receipt->receipt_number : 'Invalid' }}
          </h3>
        </div>

        @if($collection->category == 'Penalty Fee')
        <div class="rounded mt-4 badge badge-danger p-2 bg-gray-300 text-primary text-sm">
          <hr>
          {{ $collection->penalty_reason ?? 'Penalty Feef' }}
        </div>
        @endif

        <div class="my-10 rounded-sm border border-stroke p-5 dark:border-strokedark">
            <div class="items-center sm:flex">
                {{-- <div class="mb-3 mr-6 h-20 w-20 sm:mb-0">
                <img src="src/images/product/product-thumb.png" alt="product" class="h-full w-full rounded-sm object-cover object-center">
                </div> --}}
                <div class="w-full items-center justify-between md:flex">
                    
                    @if (!empty($collection->customs->toArray()))
                    <div class="mb-3 md:mb-0">
                        <a href="#" class="inline-block font-medium text-black hover:text-primary dark:text-white">
                            {{ $collection->stream->type }}
                        </a>
                        <p class="flex text-sm font-medium">
                            <span class="mr-5"> Code: {{ $collection->stream->code }} </span>
                            <span class="mr-5"> Vehicle: {{ $collection->stream->name }} </span>
                            <span class="mr-5"> Registration Number: {{ $collection->customs->first()->vehicleRegNumber  }} </span>
                        </p>
                    </div>
                    <div class="flex items-center md:justify-end">
                        <p class="mr-20 font-medium text-black dark:text-white">
                            Qty: 01
                        </p>
                        <p class="mr-5 font-medium text-black dark:text-white">
                            K{{ $collection->total_amount }}
                        </p>
                    </div>
                    @elseif(!empty($collection->toArray()))
                    <div class="mb-3 md:mb-0">
                        <a href="#" class="inline-block font-medium text-black hover:text-primary dark:text-white">
                            {{ $collection->stream->name }}
                        </a>
                        <p class=" text-sm font-medium">
                            <span class="mr-5"> Code: {{ $collection->stream->code }} </span>
                            <span class="mr-5"> {{ $collection->stream->description }}</span>
                            
                        </p>
                    </div>
                    <div class="flex items-center md:justify-end">
                        <p class="mr-20 font-medium text-black dark:text-white">
                            Qty: 01
                        </p>
                        <p class="mr-5 font-medium text-black dark:text-white">
                            K{{ $collection->total_amount }}
                        </p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="-mx-4 flex flex-wrap">
          <div class="w-full px-4 sm:w-1/2 xl:w-3/12">
            <div class="mb-10">
              {{-- <h4 class="mb-4 text-xl font-medium text-black dark:text-white md:text-2xl">
                Shipping Method
              </h4>
              <p class="font-medium">
                FedEx - Take up to 3 <br>
                working days.
              </p> --}}
            </div>
          </div>
          <div class="w-full px-4 sm:w-1/2 xl:w-3/12">
            <div class="mb-10">
              <h4 class="mb-4 text-xl font-medium text-black dark:text-white md:text-2xl">
                Payment Method
              </h4>
              <p class="font-medium">
                {{ $collection->payment_method ?? 'Cash' }}
              </p>
            </div>
          </div>
          <div class="w-full px-4 xl:w-6/12">
            <div class="mr-10 text-right md:ml-auto">
              <div class="ml-auto sm:w-1/2">
                <p class="mb-4 flex justify-between font-medium text-black dark:text-white">
                  <span> Subtotal </span>
                  <span> K{{ $collection->total_amount }} </span>
                </p>
                {{-- <p class="mb-4 flex justify-between font-medium text-black dark:text-white">
                  <span> Shipping Cost (+) </span>
                  <span> $10.00 </span>
                </p> --}}
                <p class="mb-4 mt-2 flex justify-between border-t border-stroke pt-6 font-medium text-black dark:border-strokedark dark:text-white">
                  <span> Total Paid </span>
                  <span> K{{ $collection->total_amount }} </span>
                </p>
              </div>

              {{-- <div class="mt-10 flex flex-col justify-end gap-4 sm:flex-row">
                <button class="flex items-center justify-center rounded border border-primary py-2.5 px-8 text-center font-medium text-primary hover:opacity-90">
                  Download Invoice
                </button>
                <button class="flex items-center justify-center rounded bg-primary py-2.5 px-8 text-center font-medium text-gray hover:bg-opacity-90">
                  Send Invoice
                </button>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
      <!-- ====== Invoice Section End -->
    </div>
  </main>
