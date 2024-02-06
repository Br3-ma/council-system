<div class="col-span-12 rounded-sm border border-stroke bg-white px-5 pt-7.5 pb-5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:col-span-12">
    <div class="flex flex-wrap items-start justify-between gap-3 sm:flex-nowrap">
        <div class="flex w-full flex-wrap gap-3 sm:gap-5">
            <h4 class="text-xl font-bold text-black dark:text-white">
                28 Days Collection Trend
            </h4>
        </div>
    </div>
    <div>
        <div id="areachart" class="-ml-5"></div>
    </div>
</div>

@push('js')
<script>
    var options = {
        chart: {
            type: 'area', // Change from 'bar' to 'area'
            height: 500
        },
        series: [{
            name: 'Amount',
            data: @json($series)
        }],
        xaxis: {
            categories: @json($categories)
        }
    };

    var chart = new ApexCharts(document.querySelector("#areachart"), options);
    chart.render();
</script>
@endpush
