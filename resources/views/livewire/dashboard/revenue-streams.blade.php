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
            @can('add revenue streams')
            <button onclick="openModal('newStreamModal')" class="mt-2 flex items-center gap-2 rounded bg-primary py-3 px-4.5 font-medium text-white hover:bg-opacity-80">
                Add New
            </button>
            @endcan
            </div>
            
            @include('livewire.alerts.alerts')
            <div class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
                <div class="max-w-full overflow-x-auto">
                    <table id="revenue_streams" class="w-full table-auto">
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
                                <div class="flex items-center  space-x-3.5">
                                
                                    <form action="{{ route('streams.destroy', $s->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?')">
                                        @csrf
                                        @method('DELETE')
                                    
                                        <button type="submit" class="hover:text-primary flex text-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <!-- Your SVG path here -->
                                            </svg>
                                            <small>
                                                Remove
                                            </small>
                                        </button>
                                    </form>
                                    
                                    <a href="{{ route('streams.edit', $s->id) }}" class="hover:text-primary flex text-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <!-- Your SVG path here -->
                                        </svg>
                                        <small>
                                            Edit
                                        </small>
                                    </a>
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
