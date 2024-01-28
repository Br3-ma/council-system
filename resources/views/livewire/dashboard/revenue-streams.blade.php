<main>
    <div class="mx-auto max-w-screen-2xl md:p-6 2xl:p-10">
        <!-- Breadcrumb Start -->
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-black dark:text-white">
                Revenue Streams
            </h2>

            <nav>
            <ol class="flex items-center gap-2">
                <li>
                <a class="font-medium" href="{{ route('dashboard') }}">Dashboard /</a>
                </li>
                <li class="font-medium text-primary">Revenue Streams</li>
            </ol>
            </nav>
        </div>
        <!-- Breadcrumb End -->

        <!-- ====== Table Section Start -->
        <div class="flex flex-col gap-10">
            <div class="w-full">
            <button onclick="openModal('newStreamModal')" class="mt-2 flex items-center gap-2 rounded bg-primary py-3 px-4.5 font-medium text-white hover:bg-opacity-80">
                Add New
            </button>
            </div>
            
            @include('livewire.alerts.alerts')
            <div class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
                <div class="max-w-full overflow-x-auto">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-gray-2 text-left dark:bg-meta-4">
                                <th class="font-bold fw-bold min-w-[220px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
                                    Revenue Stream
                                </th>
                                <th class="font-bold fw-bold min-w-[150px] py-4 px-4 font-medium text-black dark:text-white">
                                    Total Transctions
                                </th>
                                <th class="font-bold fw-bold py-4 px-4 font-medium text-black dark:text-white">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($streams as $s)<tr>
                            <td class="border-b border-[#eee] py-5 px-2 pl-9 dark:border-strokedark xl:pl-11">
                                <h5 class="font-bold fw-bold text-black dark:text-white"> {{ $s->name }} </h5>
                                
                            </td>

                            <td class="border-b border-[#eee] py-5 px-2 pl-9 dark:border-strokedark xl:pl-11">
                                <h5 class="font-bold fw-bold text-black dark:text-white">K{{ $s->transacts->sum('total_amount') }}</h5>
                                <p class="text-sm"> {{ $s->transacts->count() }} Transaction(s)</p>
                            </td>

                            <td class="border-b border-[#eee] py-5 px-2 dark:border-strokedark">
                                <div class="flex items-center text-danger space-x-3.5">
                                
                                <button wire:click="delete({{$s->id}})" class="hover:text-primary flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                    </svg>
                                    <small>
                                        Remove
                                    </small>
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
    @include('livewire.partials.streams.new-modal')
  </main>
