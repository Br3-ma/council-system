<main>
    <div class="mx-auto max-w-screen-2xl md:p-6 2xl:p-10">
        <!-- Breadcrumb Start -->
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-black dark:text-white">
                Staff Members
            </h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium" href="{{ route('dashboard') }}">Dashboard /</a>
                    </li>
                    <li class="font-medium text-primary">Staff members</li>
                </ol>
            </nav>
        </div>
        <!-- Breadcrumb End -->

        <!-- ====== Table Section Start -->
        <div class="flex flex-col gap-10">
            <!-- ====== Table Two Start -->
            <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="py-6 px-4 md:px-6 xl:px-7.5">
                    <h4 class="text-xl font-bold text-black dark:text-white">Staff Members</h4>
                </div>

                <div  class="grid grid-cols-6 border-t border-stroke py-4.5 px-4 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
                    <div class="col-span-3 flex items-center">
                        <p class="font-medium">Names</p>
                    </div>
                    <div class="col-span-2 hidden items-center sm:flex">
                        <p class="font-medium">Phone</p>
                    </div>
                    <div class="col-span-1 flex items-center">
                        <p class="font-medium">NRC No.</p>
                    </div>
                    <div class="col-span-1 flex items-center">
                        <p class="font-medium">Address</p>
                    </div>
                    <div class="col-span-1 flex items-center">
                        <p class="font-medium">Start Date</p>
                    </div>
                </div>

                @forelse ($users as $u)
                <div class="grid grid-cols-6 border-t border-stroke py-4.5 px-4 dark:border-strokedark sm:grid-cols-8 md:px-6 2xl:px-7.5">
                    <div class="col-span-3 flex items-center">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
                    <div class="h-12.5 w-15 rounded-md">
                        <img src="{{ asset('/images/product/product-04.png')}}" alt="Product" />
                    </div>
                    <p class="text-sm font-medium text-black dark:text-white">
                        {{ $u->fname.' '.$u->lname }}
                    </p>
                    </div>
                    </div>
                    <div class="col-span-2 hidden items-center sm:flex">
                    <p class="text-sm font-medium text-black dark:text-white">{{ $u->phone }}</p>
                    </div>
                    <div class="col-span-1 flex items-center">
                    <p class="text-sm font-medium text-black dark:text-white">{{ $u->nrc }}</p>
                    </div>
                    <div class="col-span-1 flex items-center">
                    <p class="text-sm font-medium text-black dark:text-white">{{ $u->address }}</p>
                    </div>
                    <div class="col-span-1 flex items-center">
                    <p class="text-sm font-medium text-meta-3">{{ $u->start_date }}</p>
                    </div>
                </div>
                @empty
                    
                @endforelse
                
            </div>
            <!-- ====== Table Three End -->
        </div>
        <!-- ====== Table Section End -->
    </div>
</main>
