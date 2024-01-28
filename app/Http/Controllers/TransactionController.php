<?php

namespace App\Http\Controllers;

use App\Models\CustomDetail;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
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
        // Data is an array with payload from the Mobile App
        $data = $request->toArray();

        $t = Transaction::create([
            'stream_id' => $data['revenue_stream_id'],  //Wait for API I will give you for locations added by admin
            'customer_id' => null, //nullable for now
            'employee_id' => null, //nullable for now
            'terminal_id' => 1, //nullable or Wait for API I will give you for locations added by admin
            'district_id' => $data['location_id'],  //Wait for API I will give you for locations added by admin
            'transaction_date' => now(), // or $data['date'],
            'total_amount' => $data['amount'],
            'discount_amount' => 0, //nullable
            'tax_amount' => 0, //nullable
            'net_amount' => $data['amount'], //nullable
            'payment_method' => $data['payment_method'], //cash etc
            'payment_status' => 1,
        ]);
        
        // A field to specific if a transaction contains customs data (make it true or false)
        if( $data['customs']){
            CustomDetail::create([
                'transaction_id' => $t->id,
                'type' =>  $data['customs_type'],
                'vehicleRegNumber' =>  $data['vehicle_reg_num'],
                'entity' =>  $data['entity']
            ]);
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
    public function destroy(string $id)
    {
        //
    }
}
