<?php

namespace App\Livewire\Dashboard;

use App\Models\Stream;
use App\Models\Transaction;
use Livewire\Component;
use Illuminate\Support\Carbon;

class Dashboard extends Component
{

    protected $listeners = ['refreshDashboard' => '$refresh'];
    public $total_today, $total_net_collected, $total_gross_collected;
    public $num_of_streams, $num_of_transaction_today;
    public $transactions, $transactions_today, $streams, $num_of_transactions, $num_of_transactions_today;

    // charts
    public $labels = []; //bar
    public $labels1 = []; //pie
    public $series = []; //bar
    public $series1 = []; //pie
    public $categories = [];

    public function render()
    {
        $this->get_stats();
        $this->collections_by_streams();
        $this->collections_streams_pie();

        // dd($this->chart1Data);
        // dd($this->chart1Categories);
        return view('livewire.dashboard.dashboard')
        ->layout('layouts.app');
    }

    // This function will be called every 3 seconds
    public function poll()
    {
        $this->get_stats();
        $this->collections_by_streams();
        $this->collections_streams_pie();
    }

    public function get_stats(){
        $this->total_today = $this->total_collected_today();
        $this->num_of_transactions = Transaction::count();
        $this->num_of_transactions_today = $this->count_collected_today();
        
        $this->num_of_transaction_today = $this->num_transaction_today();
        $this->num_of_streams = $this->num_revenue_streams();
        $this->total_net_collected = $this->net_collected();
        $this->total_gross_collected = $this->gross_collected();
        // Modals
        $this->transactions = Transaction::orderBy('created_at', 'desc')->get();
        $today = Carbon::today();
        $this->transactions_today = Transaction::where('created_at', '<=', $today->toDateTimeString())->orderBy('created_at', 'desc')->get();
        $this->streams = Stream::with('transacts')->orderBy('id', 'asc')->get();
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
        // dd($today->toDateTimeString());
        $totalToday = Transaction::where('created_at', '<=', $today->toDateTimeString())->sum('total_amount');
        
        return number_format($totalToday, 2);
    }

    public function count_collected_today()
    {
        $today = Carbon::today();
        $totalToday = Transaction::whereDate('created_at', $today);
        return $totalToday->count();
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
    
        // Fetch transactions within the last 29 days
        $endDate = Carbon::now();
        $startDate = $endDate->copy()->subDays(28);

        $groupedTransactions = Transaction::whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('created_at')
            ->get()
            ->groupBy(function ($transaction) {
                return Carbon::parse($transaction->created_at)->format('F j, Y');
            });
    
        // Extract series and categories arrays
        $this->series = $groupedTransactions->map(function ($group) {
            return $group->sum('total_amount');
        })->values()->toArray();
    
        $this->categories = $groupedTransactions->keys()->toArray();
    }
    
    // work on the next
    public function collections_streams_pie()
    {
        $streams = Stream::with('transacts')->get();
    
        foreach ($streams as $data) {
            $totalAmount = $data->transacts->sum('total_amount');
            $this->series1[] = $totalAmount;
            $this->labels1[] = $data->name;
        }

        // dd($this->series1);

    }
    
}
