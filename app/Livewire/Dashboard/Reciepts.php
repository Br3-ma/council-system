<?php

namespace App\Livewire\Dashboard;

use App\Models\Transaction;
use Livewire\Component;

class Reciepts extends Component
{
    public $transactions;
    public function render()
    {
        $this->transactions = Transaction::orderBy('created_at', 'desc')->get();
        return view('livewire.dashboard.reciepts')->layout('layouts.app');
    }
}
