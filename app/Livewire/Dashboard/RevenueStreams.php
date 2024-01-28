<?php

namespace App\Livewire\Dashboard;

use App\Models\Stream;
use Livewire\Component;

class RevenueStreams extends Component
{
    public $streams, $name, $description;
    public function render()
    {
        $this->streams = Stream::with('transacts')->orderBy('name', 'asc')->get();
        return view('livewire.dashboard.revenue-streams')->layout('layouts.app');
    }

    public function save_stream(){
        try {
            Stream::create([
                'name'=>$this->name,
                'description'=>$this->description,
            ]);
            session()->flash('success', 'Created Successfully');
            return redirect()->route('streams');
        } catch (\Throwable $th) {
            session()->flash('error', 'Oops something failed.');
            return redirect()->route('streams');
        }
    }
    public function delete($id){
        try {
            $district = Stream::find($id);
            if (!$district) {
                session()->flash('warning', 'Stream not found');
                return redirect()->route('streams');
            }
            $district->delete();
            session()->flash('success', 'Deleted Successfully');
            return redirect()->route('streams');
        } catch (\Exception $e) {
            session()->flash('error', 'Oops something failed.');
            return redirect()->route('streams');
        }
    }
}
