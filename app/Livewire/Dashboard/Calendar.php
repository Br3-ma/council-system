<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class Calendar extends Component
{
    public function render()
    {
        return view('livewire.dashboard.calendar')->layout('layouts.app');
    }
}
