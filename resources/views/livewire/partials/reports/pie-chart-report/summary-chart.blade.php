<div class="mt-2 col-span-12 rounded-sm border border-stroke bg-white px-5 pt-7.5 pb-5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:col-span-12">
    <div class="flex flex-wrap items-start justify-between gap-3 sm:flex-nowrap">
        <div class="flex w-full flex-wrap gap-3 sm:gap-5">
            <h4 class="text-xl font-bold text-black dark:text-white">
                Pie Chart
            </h4>
        </div>
    </div>
    <div>
        <div id="piechart"></div>
    </div>
</div>

@push('js')
<script>
    var options = {
        chart: {
            type: 'pie',
            width: 500,
            height: 350 // Adjust height as needed
        },
        series: @json($series),
        labels: @json($labels)
    };

    var chart = new ApexCharts(document.querySelector("#piechart"), options);
    chart.render();
</script>
@endpush
