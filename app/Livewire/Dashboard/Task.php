<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class Task extends Component
{
    public function render()
    {
        return view('livewire.dashboard.task')->layout('layouts.app');
    }
}
