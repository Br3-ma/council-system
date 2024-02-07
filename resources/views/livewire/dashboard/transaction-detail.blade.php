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
                Nakonde City Council
              </h4>
              <a href="#" class="block"><span class="font-medium">Email:</span>
                contact@example.com</a>
              <span class="mt-2 block"><span class="font-medium">Address:</span> 2972 Westheimer
                Rd. Santa Ana.</span>
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
            </div>
          </div>
          <h3 class="text-2xl font-medium text-black dark:text-white">
            Receipt #{{ $collection->receipt != null ? $collection->receipt->receipt_number : 'Invalid' }}
          </h3>
        </div>

        <div class="my-10 rounded-sm border border-stroke p-5 dark:border-strokedark">
            <div class="items-center sm:flex">
                {{-- <div class="mb-3 mr-6 h-20 w-20 sm:mb-0">
                <img src="src/images/product/product-thumb.png" alt="product" class="h-full w-full rounded-sm object-cover object-center">
                </div> --}}
                <div class="w-full items-center justify-between md:flex">
                    
                    @if (!empty($collection->customs->toArray()))
                    <div class="mb-3 md:mb-0">
                        <a href="#" class="inline-block font-medium text-black hover:text-primary dark:text-white">
                            {{ $collection->streams->type }}
                        </a>
                        <p class="flex text-sm font-medium">
                            <span class="mr-5"> Color: White </span>
                            <span class="mr-5"> Size: Medium </span>
                            {{-- @dd(($collection->customs)) --}}
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
                            {{-- @dd(($collection->customs)) --}}
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
