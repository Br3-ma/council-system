<div class="col-span-12 rounded-sm border border-stroke bg-white px-5 pt-7.5 pb-5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:col-span-12">
    <div class="flex flex-wrap items-start justify-between gap-3 sm:flex-nowrap">
        <div class="flex w-full flex-wrap gap-3 sm:gap-5">
            <h4 class="text-xl font-bold text-black dark:text-white">
                Last 28 Days of Collections | Bar Chart
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
    </div>
    <div>
        <div id="barchart" class="-ml-5"></div>
    </div>
</div>
@push('js')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    var options1;
    var chart1;

    function fetchData2() {
        options1 = [];
        axios.get("{{ url('/collections_by_streams') }}", {
                params: {
                    // Append timestamp to the URL to prevent caching
                    timestamp: new Date().getTime()
                }
            })
            .then(response => {
                // Clear existing chart if it exists
                if (chart1) {
                    chart1.destroy();
                }
                var options1 = {
                    chart: {
                        type: 'bar',
                        height: 500,
                        animations: {
                            enabled: false // Disable animations
                        }
                    },
                    series: [{
                        name: 'Total Amount',
                        data: response.data.series
                    }],
                    xaxis: {
                        categories: response.data.categories
                    }
                };

                chart1 = new ApexCharts(document.querySelector("#barchart"), options1);
                chart1.render();
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    }
    fetchData2();
    // Fetch data every 5 seconds
    setInterval(fetchData, 6000);
</script>
@endpush