<?php

namespace App\Livewire\Dashboard;

use App\Models\Transaction;
use Livewire\Component;

class TransactionDetail extends Component
{
    public $transact_id, $collection;

    public function mount($id){
        $this->transact_id = $id;
    }
    public function render()
    {
        $this->collection = Transaction::where('id', $this->transact_id)->first();
        return view('livewire.dashboard.transaction-detail')->layout('layouts.app');
    }
}
