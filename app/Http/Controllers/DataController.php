<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Stream;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function get_streams()
    {
        $streams = Stream::orderBy('name', 'asc')->get();
        return response()->json(['revenue_streams' => $streams]);
    }

    public function get_locations()
    {
        $districts = District::orderBy('name', 'asc')->get();
        return response()->json(['district' => $districts]);
    }
}
