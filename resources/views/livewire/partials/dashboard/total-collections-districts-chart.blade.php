    <div  class="col-span-12 rounded-sm border border-stroke bg-white px-2 pt-7.5 pb-5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5">
        <div class="flex flex-wrap items-start justify-between gap-3 sm:flex-nowrap">
            <div class="flex w-full flex-wrap gap-3 sm:gap-5">
                <h4 class="text-xl font-bold text-black dark:text-white">
                    Overview Collections by Location
                </h4>
            </div>
        </div>
        <div>
            <div id="piepie" class="-ml-5"></div>
        </div>
    </div>

    @push('js')
    <script>
            var options = {
            series: @json($series1),
                chart: {
                width: 600,
                heigh: 600,
                type: 'pie',
                },
                labels: @json($labels1),
                responsive: [{
                breakpoint: 480,
                    options: {
                        chart: {
                            width: 200,
                        },
                        legend: {
                        position: 'bottom'
                        }
                    }
                }]
            };

            var chart = new ApexCharts(document.querySelector("#piepie"), options);
            chart.render();
    </script>
    @endpush
