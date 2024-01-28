@switch($report_type)
    @case('summary')
        @include('livewire.partials.reports.pie-chart-report.summary-chart')
    @break

    @case('collection')
        @include('livewire.partials.reports.pie-chart-report.collection-chart')
    @break

    @case('transaction')
        @include('livewire.partials.reports.pie-chart-report.transaction-chart')
    @break

    @default
        
@endswitch