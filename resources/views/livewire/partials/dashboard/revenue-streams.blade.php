    <div id="revenueStreams" class="outer-closer">
        <div class="modal-content">
            <div class="w-full flex justify-between items-center">
                <span class="fw-bold font-bold text-primary">
                    <h2>Available Revenue Streams</h2>
                </span>
                <span onclick="closeModal('revenueStreams')" class="rounded-full bg-danger text-white p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                    </svg>
                </span>
            </div>
        

            <div class="flex flex-col gap-10">
                <div class="rounded-sm bg-white pt-6 pb-2.5 dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
                    <div class="max-w-full overflow-x-auto">
                        @if (!empty($streams->toArray()))
                            <table id="revenue_streams_dash" class="w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-2 text-left dark:bg-meta-4">
                                        <th class="font-bold fw-bold min-w-[220px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
                                            Revenue Stream
                                        </th>
                                        <th class="font-bold fw-bold min-w-[150px] py-4 px-4 font-medium text-black dark:text-white">
                                            Total Transctions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse ($streams as $s)<tr>
                                    <td class="border-b border-[#eee] text-left py-5 px-2 pl-9 dark:border-strokedark xl:pl-11">
                                        <h5 class="font-bold fw-bold text-black dark:text-white"> {{ $s->name }} </h5>
                                        <p class="text-sm">Lusaka</p>
                                    </td>
        
                                    <td class="border-b border-[#eee] text-left py-5 px-2 pl-9 dark:border-strokedark xl:pl-11">
                                        <h5 class="font-bold fw-bold text-black dark:text-white">K{{ $s->transacts->sum('total_amount') }}</h5>
                                        <p class="text-sm"> {{ $s->transacts->count() }} Transaction(s)</p>
                                    </td>
    
                                </tr>
                                @empty
                                @endforelse
                                </tbody>
                            </table>
                        @else
                            
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>