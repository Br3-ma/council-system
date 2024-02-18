<div class="col-span-12 rounded-sm border border-stroke bg-white px-5 pt-7.5 pb-5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:col-span-12">
    <div class="flex flex-wrap items-start justify-between gap-3 sm:flex-nowrap">
        <div class="flex w-full flex-wrap gap-3 sm:gap-5">
            <h4 class="text-xl font-bold text-black dark:text-white">
                Last 28 Days | Overview Collection Trend
            </h4>
        </div>
    </div>
    <div>
        <div id="areachart" class="-ml-5"></div>
    </div>
</div>
@push('js')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    var options;
    var chart;

    function fetchData() {
        options = [];
        axios.get("{{ url('/collections_by_streams') }}", {
                params: {
                    // Append timestamp to the URL to prevent caching
                    timestamp: new Date().getTime()
                }
            })
            .then(response => {
                // Clear existing chart if it exists
                if (chart) {
                    chart.destroy();
                }

                options = {
                    chart: {
                        type: 'area', // Change from 'bar' to 'area'
                        height: 500,
                        animations: {
                            enabled: false // Disable animations
                        }
                    },
                    series: [{
                        name: 'Amount',
                        data: response.data.series
                    }],
                    xaxis: {
                        categories: response.data.categories
                    }
                };

                chart = new ApexCharts(document.querySelector("#areachart"), options);
                chart.render();
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    }
    fetchData();
    // Fetch data every 15 seconds
    setInterval(fetchData, 30000);
</script>
@endpush



