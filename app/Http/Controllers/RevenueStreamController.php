<?php

namespace App\Http\Controllers;

use App\Models\Stream;
use Illuminate\Http\Request;

class RevenueStreamController extends Controller
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
    public function store(Request $request)
    {
        $data = $request->toArray();
        try {
            Stream::create([
                'name'=>$data['name'],
                'type'=>$data['type'],
                'code'=>$data['code'],
                'icon'=>$data['icon'],
                'amount'=>$data['amount'],
                'description'=>$data['description'],
            ]);
            session()->flash('success', 'Created Successfully');
            return redirect()->route('streams');
        } catch (\Throwable $th) {
            session()->flash('error', 'Oops something failed.'.$th->getMessage());
            return redirect()->route('streams');
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
    public function edit($id)
    {
        $stream = Stream::find($id);

        if (!$stream) {
            return redirect()->route('streams.index')
                ->with('error', 'Revenue stream not found');
        }
    
        return view('livewire.dashboard.edit-revenue-stream', compact('stream'))->layout('layouts.app');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $stream = Stream::find($id);
    
        if (!$stream) {
            return redirect()->route('streams')
                ->with('error', 'Revenue stream not found');
        }
    
        // $request->validate([
        //     // Add validation rules for your form fields
        // ]);
    
        $stream->update($request->all());
    
        return redirect()->route('streams')
            ->with('success', 'Revenue stream updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $stream = Stream::find($id);
    
        if (!$stream) {
            return redirect()->route('streams')
                ->with('error', 'Revenue stream not found');
        }
    
        $stream->delete();
    
        return redirect()->route('streams')
            ->with('success', 'Revenue stream deleted successfully');
    }
    
}
