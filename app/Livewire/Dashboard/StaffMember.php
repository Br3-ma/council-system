<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;

class StaffMember extends Component
{
    public $users;
    public function render()
    {
        $this->users = User::get();
        return view('livewire.dashboard.staff-member')->layout('layouts.app');
    }
    public function save_district(){
        try {
            // User::create([
            //     'fname',
            //     'mname',
            //     'lname',
            //     'address',
            //     'phone',
            //     'nrc',
            //     'dob',
            //     'start_date',
            //     'email',
            //     'password',
            // ]);
            return redirect()->route('districts');
        } catch (\Throwable $th) {
            return redirect()->route('districts');
        }
    }

    public function delete($id){
        try {
            $district = User::find($id);
            if (!$district) {
                return redirect()->route('districts');
            }
            $district->delete();
            return redirect()->route('districts');
        } catch (\Exception $e) {
            return redirect()->route('districts');
        }
    }
}
