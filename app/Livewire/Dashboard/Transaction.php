<?php

namespace App\Livewire\Dashboard;

use App\Models\Transaction as Transact;
use Livewire\Component;

class Transaction extends Component
{
    public $transactions;
    public function render()
    {
        $this->transactions = Transact::orderBy('created_at', 'desc')->get();
        // dd($this->transactions);
        return view('livewire.dashboard.transaction')->layout('layouts.app');
    }
}
