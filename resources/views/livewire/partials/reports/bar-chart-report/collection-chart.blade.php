<div class="mt-2 col-span-12 rounded-sm border border-stroke bg-white px-5 pt-7.5 pb-5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:col-span-12">
    <div class="flex flex-wrap items-start justify-between gap-3 sm:flex-nowrap">
        <div class="flex w-full flex-wrap gap-3 sm:gap-5">
            <h4 class="text-xl font-bold text-black dark:text-white">
                Bar Chart
            </h4>
            {{-- <div class="flex min-w-47.5">
                <span class="mt-1 mr-2 flex h-4 w-full max-w-4 items-center justify-center rounded-full border border-primary">
                    <span
                    class="block h-2.5 w-full max-w-2.5 rounded-full bg-primary"
                    ></span>
                </span>
                <div class="w-full">
                    <p class="font-semibold text-primary">Total Revenue</p>
                    <p class="text-sm font-medium">12.04.2022 - 12.05.2022</p>
                </div>
            </div>
            <div class="flex min-w-47.5">
                <span class="mt-1 mr-2 flex h-4 w-full max-w-4 items-center justify-center rounded-full border border-secondary">
                    <span class="block h-2.5 w-full max-w-2.5 rounded-full bg-secondary"></span>
                </span>
                <div class="w-full">
                    <p class="font-semibold text-secondary">Total Sales</p>
                    <p class="text-sm font-medium">12.04.2022 - 12.05.2022</p>
                </div>
            </div> --}}
        </div>
        {{-- <div class="flex w-full max-w-45 justify-end">
            <div class="inline-flex items-center rounded-md bg-whiter p-1.5 dark:bg-meta-4">
                <button class="rounded bg-white py-1 px-3 text-xs font-medium text-black shadow-card hover:bg-white hover:shadow-card dark:bg-boxdark dark:text-white dark:hover:bg-boxdark">
                    Day
                </button>
                <button class="rounded py-1 px-3 text-xs font-medium text-black hover:bg-white hover:shadow-card dark:text-white dark:hover:bg-boxdark">
                    Week
                </button>
                <button class="rounded py-1 px-3 text-xs font-medium text-black hover:bg-white hover:shadow-card dark:text-white dark:hover:bg-boxdark">
                    Month   
                </button>
                <button class="rounded py-1 px-3 text-xs font-medium text-black hover:bg-white hover:shadow-card dark:text-white dark:hover:bg-boxdark">
                    Year   
                </button>
            </div>
        </div> --}}
    </div>
    <div>
        <div id="barchart" class="-ml-5"></div>
    </div>
</div>
@push('js')
<script>
    var options = {
        chart: {
            type: 'bar',
            height: 500
        },
        series: [{
            name: 'Total Amount',
            data: @json($series)
        }],
        xaxis: {
            categories: @json($categories)
        }
    };

    var chart = new ApexCharts(document.querySelector("#barchart"), options);
    chart.render();
</script>    
@endpush