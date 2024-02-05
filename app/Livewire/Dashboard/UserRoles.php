<?php

namespace App\Livewire\Dashboard;

use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRoles extends Component
{
    public $role, $user_roles, $name, $role_name, $role_id, $rolePermissions;
    public $permission = [];
    public function render()
    {        
        $this->user_roles = Role::pluck('name')->toArray();
        $permissions = Permission::whereNotNull('group')->get()->groupBy('group');

        // dd($this->permissions);
        $roles = Role::orderBy('id','DESC')->paginate(5);
        
        return view('livewire.dashboard.user-roles', [
            'roles' => $roles,
            'permissions' => $permissions
        ])->layout('layouts.app');
    }

    
    public function store(){
        // $this->validate($request, [
        //     'name' => 'required|unique:roles,name',
        //     'permission' => 'required',
        // ]);
        try {
            $role = Role::create([
                'name' => $this->name,
                'guard_name' => 'web'
            ]);
            $role->syncPermissions($this->permission);
        
            Session::flash('attention', "New role created successfully.");
            $this->clearFields();
            return redirect()->route('roles');
        } catch (\Throwable $th) {
            Session::flash('error_msg', substr($th->getMessage(),16,110));
            return redirect()->route('roles');
        }
    }
}
