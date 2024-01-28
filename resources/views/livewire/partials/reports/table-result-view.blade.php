@switch($report_type)
    @case('summary')
        @include('livewire.partials.reports.table-report.summary')
    @break

    @case('collection')
        @include('livewire.partials.reports.table-report.collection')
    @break
        
    @case('collection_stream')
        @include('livewire.partials.reports.table-report.collection_stream')
    @break

    @case('collection_district')
        @include('livewire.partials.reports.table-report.collection_district')
    @break
    
    @case('transaction')
        @include('livewire.partials.reports.table-report.transaction')
    @break

    @default
        
@endswitch