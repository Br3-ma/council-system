<?php

namespace App\Http\Controllers;

use App\Models\CustomDetail;
use App\Models\Reciept;
use App\Models\Stream;
use App\Models\Transaction;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class ReceiptController extends Controller
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
                                // dd($data);
                                if ($row['A'] !== null || $row['B'] !== null) {
                                    Reciept::create([
                                        'transaction_id' => $row['A'],
                                        'receipt_number' => $row['B']
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

            // Reciept::create([
            //     'transaction_id' => $t->id,
            //     'receipt_number' =>  $data['receiptNumber'],
            // ]);
            
            // Return a JSON response with the created transaction
            // return response()->json(['transaction' => $t, 'message'=>'success'], 201);
        } catch (\Throwable $th) {
            // return response()->json(['transaction' => $th->getMessage(), 'message'=>'failed'], 500);
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

        
    public function export_receipts(){
        $transactions = Transaction::get();
    
        // Define custom headers
        $headers = [
            'Date','Receipt No', 'Transaction ID', 'Total Amount',
            'Payment Method', 'Machine ID', 'Done By', 'Is Sync'
        ];

    
        // Create a new Spreadsheet instance
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
    
        // Add headers to the sheet
        $sheet->fromArray([$headers], NULL, 'A1');
    
        // Add data to the sheet
        $data = [];
        foreach ($transactions as $transaction) {
           if($transaction->receipt != null){
                $data[] = [
                    $transaction->created_at,
                    $transaction->receipt->receipt_number,
                    $transaction->id,
                    $transaction->total_amount,
                    $transaction->stream->name,
                    $transaction->payment_method,
                    $transaction->machine_id,
                    $transaction->created_by,
                    $transaction->is_sync
                ];
            }
        }

        $sheet->fromArray($data, NULL, 'A2');
    
        // Save the Excel file
        $fileName = 'All Transactions Export.xlsx';
        $writer = new Xlsx($spreadsheet);
    
        // Stream the file to the browser
        ob_start();
        $writer->save('php://output');
        $content = ob_get_clean();
    
        return response($content)
            ->header('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
            ->header('Content-Disposition', 'attachment;filename="' . $fileName . '"')
            ->header('Cache-Control', 'max-age=0');
    }





    public function collection_export($transactions){
        // Define custom headers
        $headers = [
            'Transaction ID','Revenue Stream', 'Transaction Date', 'Total Amount',
            'Payment Method', 'Status', 'Machine ID', 'Is Sync', 'Created At', 'Updated At'
        ];

    
        // Create a new Spreadsheet instance
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
    
        // Add headers to the sheet
        $sheet->fromArray([$headers], NULL, 'A1');
    
        // Add data to the sheet
        $data = [];
        foreach ($transactions as $transaction) {
            $data[] = [
                $transaction->id,
                $transaction->stream->name,
                $transaction->transaction_date,
                $transaction->total_amount,
                $transaction->payment_method,
                $transaction->status,
                $transaction->machine_id,
                $transaction->is_sync,
                $transaction->created_at,
                $transaction->updated_at,
            ];
        }
        $sheet->fromArray($data, NULL, 'A2');
    
        // Save the Excel file
        $fileName = 'Collections Report.xlsx';
        $writer = new Xlsx($spreadsheet);
    
        // Stream the file to the browser
        ob_start();
        $writer->save('php://output');
        $content = ob_get_clean();
    
        return response($content)
            ->header('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
            ->header('Content-Disposition', 'attachment;filename="' . $fileName . '"')
            ->header('Cache-Control', 'max-age=0');
    }


        
}
