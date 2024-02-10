<main>
    <div class="mx-auto max-w-screen-2xl md:p-6 2xl:p-10">
        <!-- Breadcrumb Start -->
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 flex items-center gap-2 font-bold text-black dark:text-white">
                
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-currency-exchange" viewBox="0 0 16 16">
                <path d="M0 5a5 5 0 0 0 4.027 4.905 6.5 6.5 0 0 1 .544-2.073C3.695 7.536 3.132 6.864 3 5.91h-.5v-.426h.466V5.05q-.001-.07.004-.135H2.5v-.427h.511C3.236 3.24 4.213 2.5 5.681 2.5c.316 0 .59.031.819.085v.733a3.5 3.5 0 0 0-.815-.082c-.919 0-1.538.466-1.734 1.252h1.917v.427h-1.98q-.004.07-.003.147v.422h1.983v.427H3.93c.118.602.468 1.03 1.005 1.229a6.5 6.5 0 0 1 4.97-3.113A5.002 5.002 0 0 0 0 5m16 5.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0m-7.75 1.322c.069.835.746 1.485 1.964 1.562V14h.54v-.62c1.259-.086 1.996-.74 1.996-1.69 0-.865-.563-1.31-1.57-1.54l-.426-.1V8.374c.54.06.884.347.966.745h.948c-.07-.804-.779-1.433-1.914-1.502V7h-.54v.629c-1.076.103-1.808.732-1.808 1.622 0 .787.544 1.288 1.45 1.493l.358.085v1.78c-.554-.08-.92-.376-1.003-.787zm1.96-1.895c-.532-.12-.82-.364-.82-.732 0-.41.311-.719.824-.809v1.54h-.005zm.622 1.044c.645.145.943.38.943.796 0 .474-.37.8-1.02.86v-1.674z"/>
                </svg>Revenue Streams
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
                                
                                    @can('delete revenue streams')
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
                                    @endcan
                                    
                                    @can('edit revenue streams')
                                    <a href="{{ route('streams.edit', $s->id) }}" class="hover:text-primary flex text-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <!-- Your SVG path here -->
                                        </svg>
                                        <small>
                                            Edit
                                        </small>
                                    </a>
                                    @endcan
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
