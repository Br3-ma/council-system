<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(User $user, Request $request)
    {
        // DB::beginTransaction();
        // dd($request);
        try {     
            if ($request->file('image_path')) {
                $url = Storage::put('public/users', $request->file('image_path'));
            }
            
            $u = $user->create(array_merge($request->all(), [
                'password' => bcrypt('nakonde@123@'),
                'active' => 1,
                'profile_photo_path' => $url ?? ''
            ]));
            
            $u->syncRoles($request->assigned_role);
            Session::flash('success', "User created successfully.");
            // DB::commit();
            return back();
        } catch (\Throwable $th) {
            // DB::rollback();
            dd($th);
            Session::flash('error', 'Oops.. An with this email already exists. please try again.');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
    
        if (!$user) {
            return redirect()->route('staff-members')
                ->with('error', 'User not found');
        }
    
        $user->delete();
    
        return redirect()->route('staff-members')
            ->with('success', 'User deleted successfully');
    }
}
