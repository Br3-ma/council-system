<?php

namespace App\Livewire\Dashboard;

use App\Models\Transaction as Transact;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Transaction extends Component
{

    use WithFileUploads;

    public $excelFile;
    public $transactions;
    public function render()
    {
        $this->transactions = Transact::where('is_deleted', 0)->orderBy('created_at', 'desc')->get();
        return view('livewire.dashboard.transaction')->layout('layouts.app');
    }
    // public function import()
    // {
    //     $this->validate([
    //         'excelFile' => 'required|mimes:xlsx,xls',
    //     ]);

    //     // Use the import class to handle the Excel import
    //     Excel::import(new YourImportClass(), $this->excelFile->getRealPath());

    //     session()->flash('success', 'Data imported successfully.');

    //     return redirect()->back();
    // }
}
