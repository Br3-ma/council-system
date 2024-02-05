<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Session;

class UserRoleController extends Controller
{
    //
    public function index()
    {
        return view('user-roles.index');
    }

    public function store(Request $request){

        try {
            $role = Role::create([
                'name' => $request->input()['name'],
                'guard_name' => 'web'
            ]);
            $role->syncPermissions($request->input()['permission']);
        
            Session::flash('attention', "New role created successfully.");
            return redirect()->route('roles');
        } catch (\Throwable $th) {
            Session::flash('error_msg', substr($th->getMessage(),16,110));
            return redirect()->route('roles');
        }
    }

}
