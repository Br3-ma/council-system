<?php

namespace App\Livewire\Dashboard;

use App\Models\Transaction;
use Livewire\Component;

class Trash extends Component
{
    public $trash;
    public function render()
    {
        $this->trash = Transaction::where('is_deleted', 1)->where('is_deleted', 1)->get();
        return view('livewire.dashboard.trash')->layout('layouts.app');
    }
}
