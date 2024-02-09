<?php

namespace App\Http\Controllers;

use App\Models\CustomDetail;
use App\Models\Reciept;
use App\Models\Transaction;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Carbon\Carbon;
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
    public function bulk_upload(Request $request)
    {
        if ($request->isMethod('post')) {
            $file = $request->file('file');
    
            if ($file->isValid() && $file->getClientOriginalExtension() == 'xlsx') {
                $uploadedFilePath = 'uploads/' . $file->getClientOriginalName();
    
                if ($file->move('uploads', $uploadedFilePath)) {
                    try {
                        $spreadsheet = IOFactory::load($uploadedFilePath);
                        $worksheet = $spreadsheet->getActiveSheet();
    
                        $data = $worksheet->toArray(null, true, true, true);
    
                        // Remove the header row
                        array_shift($data);
                        
                        try {
                            foreach ($data as $row) {
                                if ($row['A'] !== null || $row['E'] !== null || $row['J'] !== null) {
                                    $sd = Transaction::create([
                                        'stream_id' => $row['A'],
                                        'terminal_id' => $row['B'],
                                        'district_id' => $row['C'],
                                        'transaction_date' => $row['D'],
                                        'total_amount' => $row['E'],
                                        'payment_method' => $row['F'],
                                        'status' => 1,
                                        'machine_id' => $row['H'],
                                        'is_sync' => 1, //$row['I']
                                        'created_at' => $row['J'],
                                        'updated_at' => $row['K'],
                                    ]);
                                }
                            }
                        } catch (\Throwable $th) {
                            dd($th);
                        }
    
                        // Add a success flash message
                        return redirect()->back()->with('success', 'Upload successful!');
                    } catch (\Exception $e) {
                        // Add an error flash message
                        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
                    }
                } else {
                    // Add an error flash message
                    return redirect()->back()->with('error', 'Failed to move uploaded file.');
                }
            } else {
                // Add an error flash message
                return redirect()->back()->with('error', 'Invalid file or file format. Please upload an Excel file (xlsx).');
            }
        }
    }
    
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        try {
            // Data is an array with payload from the Mobile App
            $data = $request->toArray();

            $t = Transaction::create([
                'stream_id' => $data['revenueStreamID'],  //Wait for API I will give you for stream added by admin
                'customer_id' => null, //nullable for now
                'employee_id' => null, //nullable for now
                'terminal_id' => $data['machineID'], //nullable or Wait for API I will give you for locations added by admin
                'machine_id' => $data['machineID'], //nullable or Wait for API I will give you for locations added by admin
                'district_id' => $data['locationID'],  //Wait for API I will give you for locations added by admin
                'total_amount' => $data['feeAmount'],
                'discount_amount' => 0, //nullable
                'tax_amount' => 0, //nullable
                'net_amount' => $data['feeAmount'], //nullable
                'payment_method' => $data['paymentType'], //cash etc
                'payment_status' => 1,
                'transaction_date' => Carbon::parse($data['timestamp'])->toDateTimeString(),
                'created_at' => Carbon::parse($data['timestamp']),
                'updated_at' => Carbon::parse($data['timestamp']),
            ]);
            
            // A field to specific if a transaction contains customs data (make it true or false)
            if( $data['customs']){
                CustomDetail::create([
                    'transaction_id' => $t->id,
                    'type' =>  $data['customs_type'],
                    'vehicleRegNumber' =>  $data['vehicleRegNumber'],
                    'entity' =>  $data['entity']
                ]);
            }

            Reciept::create([
                'transaction_id' => $t->id,
                'receipt_number' =>  $data['receiptNumber'],
            ]);
            
            // Return a JSON response with the created transaction
            return response()->json(['transaction' => $t, 'message'=>'success'], 201);
        } catch (\Throwable $th) {
            return response()->json(['transaction' => $th->getMessage(), 'message'=>'failed'], 500);
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
