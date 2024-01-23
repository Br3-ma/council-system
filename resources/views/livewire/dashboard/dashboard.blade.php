<main>
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        @include('livewire.partials.dashboard.stats')
        
        <div class="mt-4 grid grid-cols-12 gap-4 md:mt-6 md:gap-6 2xl:mt-7.5 2xl:gap-7.5">
            @include('livewire.partials.dashboard.total-collection-stream-chart')
            @include('livewire.partials.dashboard.total-collections-districts-chart')
            {{-- @include('livewire.partials.dashboard.total-collections-chart-breakdown') --}}
            {{-- @include('livewire.partials.dashboard.collections-streams-chart') --}}
            {{-- @include('livewire.partials.dashboard.recent-transactions') --}}
        </div>
    </div>
</main>


<script>
  // -- Total Collection | Dashboard Bar Chart
  var options = @json($chart1Options);

  var chart = new ApexCharts(document.querySelector("#chart"), options);
  chart.render();


  
  // -- Collections by Districts | Dashboard Pie Chart 
  var options1 = {
      chart: {
          type: 'pie',
          width: 500,
          height: 500
      },
      series: [91, 125],
      labels: ['Markets', 'Toilets']
  };

  var chart1 = new ApexCharts(document.querySelector("#collection_pie"), options1);
  chart1.render();
</script>

