<?php

namespace App\Livewire\Dashboard;

use App\Models\Transaction;
use Livewire\Component;

class Penalties extends Component
{
    public $excelFile;
    public $transactions;
    public function render()
    {
        $this->transactions = Transaction::where('category','Penalty Fee')->orderBy('created_at', 'desc')->get();
        return view('livewire.dashboard.penalties')->layout('layouts.app');
    }
}
