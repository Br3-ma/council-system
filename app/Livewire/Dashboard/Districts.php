<?php

namespace App\Livewire\Dashboard;

use App\Models\District;
use App\Models\Province;
use Livewire\Component;

class Districts extends Component
{
    public $districts, $provinces, $name, $province_id, $map;
    public function render()
    {
        $this->provinces = Province::orderBy('id', 'asc')->get();
        $this->districts = District::with('transacts')->orderBy('name', 'asc')->get();
        return view('livewire.dashboard.districts')->layout('layouts.app');
    }

    public function save_district(){
        try {
            District::create([
                'name'=>$this->name,
                'province_id'=>$this->province_id,
                'map'=>$this->map,
            ]);
            session()->flash('success', 'Created Successfully');
            return redirect()->route('districts');
        } catch (\Throwable $th) {
            session()->flash('error', 'Oops something failed here, please contact the Administrator.');
            return redirect()->route('districts');
        }
    }

    public function delete($id){
        try {
            $district = District::find($id);
            if (!$district) {
                session()->flash('warning', 'District not found');
                return redirect()->route('districts');
            }
            $district->delete();
            session()->flash('success', 'Deleted Successfully');
            return redirect()->route('districts');
        } catch (\Exception $e) {
            session()->flash('error', 'Oops something failed here, please contact the Administrator.');
            return redirect()->route('districts');
        }
    }
}
