<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class StaffMember extends Component
{
    public $users;
    public $user_role, $roles, $permissions, $assigned_role;
    public function render()
    {
        $this->roles = Role::orderBy('id','desc')->get();
        $this->users = User::get();
        return view('livewire.dashboard.staff-member')->layout('layouts.app');
    }
    public function save_district(){
        try {
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
