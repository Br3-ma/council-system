@switch($report_type)
    @case('summary')
        @include('livewire.partials.reports.bar-chart-report.summary-chart')
    @break

    @case('collection')
        @include('livewire.partials.reports.bar-chart-report.collection-chart')
    @break

    @case('transaction')
        @include('livewire.partials.reports.bar-chart-report.transaction-chart')
    @break

    @default
        
@endswitch