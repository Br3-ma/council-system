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
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    var options;
    fetchData();
    // Fetch data every 5 seconds
    setInterval(fetchData, 3000);
    function fetchData() {
        options = [];
        axios.get("{{ url('/collections_by_streams') }}", {
            params: {
                // Append timestamp to the URL to prevent caching
                timestamp: new Date().getTime()
            }
        })
        .then(response => {
            options = {
                chart: {
                    type: 'area', // Change from 'bar' to 'area'
                    height: 500
                },
                series: [{
                    name: 'Amount',
                    data: response.data.series
                }],
                xaxis: {
                    categories: response.data.categories
                }
            };

            var chart = new ApexCharts(document.querySelector("#areachart"), options);
            chart.render();
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
    }
</script>
@endpush


