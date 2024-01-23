<?php

namespace App\Livewire\Dashboard;

use App\Models\Stream;
use App\Models\Transaction;
use Livewire\Component;
use Illuminate\Support\Carbon;

class Dashboard extends Component
{

    public $total_today, $total_net_collected, $total_gross_collected;
    public $num_of_streams, $num_of_transaction_today;


    // Collections by Streams - chart
    public $chart1Options = [];
    public $chart1Data = []; 
    public $chart1Categories = []; 
    public $chart1_options;



    public function render()
    {
        $this->get_stats();
        $this->collections_by_streams();
        // dd($this->chart1Data);
        // dd($this->chart1Categories);
        return view('livewire.dashboard.dashboard')
        ->layout('layouts.app');
    }

    public function get_stats(){
        $this->total_today = $this->total_collected_today();
        $this->num_of_transaction_today = $this->num_transaction_today();
        $this->num_of_streams = $this->num_revenue_streams();
        $this->total_net_collected = $this->net_collected();
        $this->total_gross_collected = $this->gross_collected();
    }


    // ---- External Traits

    // Metric Traits
    public function net_collected()
    {
        $netCollected = Transaction::sum('total_amount');
        return number_format($netCollected, 2);
    }
    public function gross_collected()
    {
        $taxes = Transaction::sum('tax_amount');
        $collected = Transaction::sum('total_amount');
        $grossCollected = (float) $collected - (float) $taxes;
        return number_format($grossCollected, 2);
    }

    public function total_collected_today()
    {
        $today = Carbon::today();
        $totalToday = Transaction::whereDate('created_at', $today)->sum('total_amount');
        return number_format($totalToday, 2);
    }
    public function num_transaction_today()
    {
        $today = Carbon::today();
        $totalToday = Transaction::whereDate('created_at', $today)->count();
        return number_format($totalToday, 2);
    }

    public function num_revenue_streams()
    {
        return Stream::count();
    }

    // Chart Traits
    public function collections_by_streams(){
        $this->loadChart1Data();
        $this->getTransactionDates();
    
        $this->chart1Options = [
            'chart' => [
                'type' => 'bar',
            ],
            'series' => $this->chart1Data,
            'xaxis' => [
                'type' => 'datetime',
                'categories' => $this->chart1Categories,
            ],
        ];
    }

    public function loadChart1Data()
    {
        $revenueStreams = Stream::all();

        foreach ($revenueStreams as $stream) {
            $data = Transaction::where('stream_id', $stream->id)
                ->orderBy('created_at')
                ->pluck('total_amount')
                ->toArray();

            $this->chart1Data[] = [
                'name' => $stream->name,
                'data' => $data,
            ];
        }
    }

    public function getTransactionDates()
    {
        $this->chart1Categories = Transaction::distinct()
            ->orderBy('created_at')
            ->pluck('created_at')
            ->map(function ($date) {
                return Carbon::parse($date)->format('Y-m-d\TH:i:s\Z');
            })
            ->toArray();
    }
    
    // work on the next
    public function collections_by_districts(){
        $this->loadChart1Data();
        $this->getTransactionDates();
    
        $this->chart1Options = [
            'chart' => [
                'type' => 'bar',
            ],
            'series' => $this->chart1Data,
            'xaxis' => [
                'type' => 'datetime',
                'categories' => $this->chart1Categories,
            ],
        ];
    }
}
