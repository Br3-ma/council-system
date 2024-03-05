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
                                    // dd(Carbon::parse($row['D']));
                                    $sd = Transaction::create([
                                        'stream_id' => $row['A'],
                                        'terminal_id' => $row['B'],
                                        'district_id' => $row['C'],
                                        'transaction_date' => Carbon::parse($row['D']),
                                        'total_amount' => $row['E'],
                                        'payment_method' => $row['F'],
                                        'payment_status' => 1,
                                        'status' => 1,
                                        'machine_id' => $row['H'],
                                        'is_sync' => 1, //$row['I']
                                        'created_at' => Carbon::parse($row['J']),
                                        'updated_at' => Carbon::parse($row['K']),
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
        try {
            // Data is an array with payload from the Mobile App
            $data = $request->toArray();

            $t = Transaction::create([
                'stream_id'         => $data['revenueStreamID'],  //Wait for API I will give you for stream added by admin
                'customer_id'       => null, //nullable for now
                'created_by'        => $data['staffName'],
                'employee_id'       => null, //nullable for now
                'terminal_id'       => $data['machineID'], //nullable or Wait for API I will give you for locations added by admin
                'machine_id'        => $data['machineID'], //nullable or Wait for API I will give you for locations added by admin
                'district_id'       => $data['locationID'],  //Wait for API I will give you for locations added by admin
                'total_amount'      => $data['feeAmount'],
                'discount_amount'   => 0, //nullable
                'tax_amount'        => 0, //nullable
                'entity'            => $data['entity'],
                'category'          => $data['revenueStream'],
                'net_amount'        => $data['feeAmount'], //nullable
                'payment_method'    => $data['paymentType'], //cash etc
                'payment_status'    => 1,
                'penalty_reason'    => $data['penaltyNarration'],
                'transaction_date'  => Carbon::parse($data['timestamp'])->toDateTimeString(),
                'created_at'        => Carbon::parse($data['timestamp']),
                'updated_at'        => Carbon::parse($data['timestamp']),
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

    
    public function summary_table_data()
    {
        $fromDate = Carbon::parse($_GET['from'])->startOfDay();
        $toDate = Carbon::parse($_GET['to'])->endOfDay();
    
        return Stream::with(['transacts' => function ($query) use ($fromDate, $toDate) {
            $query->whereBetween('created_at', [$fromDate, $toDate]);
        }])
        ->get();
    }
    
    public function collection_table_data()
    {
        $fromDate = Carbon::parse($_GET['from'])->startOfDay();
        $toDate = Carbon::parse($_GET['to'])->endOfDay();
    
        return Stream::leftJoin('transactions', 'streams.id', '=', 'transactions.stream_id')
        ->whereBetween('transactions.created_at', [$fromDate, $toDate])
        ->groupBy('streams.type')
        ->select('streams.*', DB::raw('SUM(transactions.total_amount) as total_amount'))
        ->get();
    }
    public function transaction_table_data()
    {
        $fromDate = Carbon::parse($_GET['from'])->startOfDay();
        $toDate = Carbon::parse($_GET['to'])->endOfDay();
    
        // Fetch transactions within the date range
        return Transaction::whereBetween('created_at', [$fromDate, $toDate])->get();
    
    }
        
    public function export_report(){

        $report_type = $_GET['report_type'];
        // Retrieve data from the database or any other source as per your requirement
        switch ($report_type) {
            case 'summary':
                $fromDate = Carbon::parse($_GET['from'])->startOfDay();
                $toDate = Carbon::parse($_GET['to'])->endOfDay();
            
                $transactions = Stream::with(['transacts' => function ($query) use ($fromDate, $toDate) {
                    $query->whereBetween('created_at', [$fromDate, $toDate]);
                }])->get();
                
                
                $headers = [
                    'Revenue Stream ID','Revenue Stream','Total Amount', 'Number of Transactions'
                ];
        
            
                // Create a new Spreadsheet instance
                $spreadsheet = new Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();
            
                // Add headers to the sheet
                $sheet->fromArray([$headers], NULL, 'A1');
            
                // Add data to the sheet
                $data = [];
                
                $grandTotal = 0;
                foreach ($transactions as $transaction) {
                    $totalAmount = $transaction->transacts->sum('total_amount');
                    $grandTotal += $totalAmount;
        
                    $data[] = [
                        $transaction->id,
                        $transaction->name,
                        $totalAmount,
                        $transaction->transacts->count(),
                    ];
                }
        
                // dd($data);
                $sheet->fromArray($data, NULL, 'A2');
            
                // Save the Excel file
                $fileName = 'Summary Report.xlsx';
                $writer = new Xlsx($spreadsheet);
            
                // Stream the file to the browser
                ob_start();
                $writer->save('php://output');
                $content = ob_get_clean();
            
                return response($content)
                    ->header('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
                    ->header('Content-Disposition', 'attachment;filename="' . $fileName . '"')
                    ->header('Cache-Control', 'max-age=0');
            break;



            case 'collection':
                $fromDate = Carbon::parse($_GET['from'])->startOfDay();
                $toDate = Carbon::parse($_GET['to'])->endOfDay();
            
                $transactions = Stream::with(['transacts' => function ($query) use ($fromDate, $toDate) {
                    $query->whereBetween('created_at', [$fromDate, $toDate]);
                }])->get();
                
                
                $headers = [
                    'Revenue Stream ID','Revenue Stream','Total Amount', 'Number of Transactions'
                ];
        
            
                // Create a new Spreadsheet instance
                $spreadsheet = new Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();
            
                // Add headers to the sheet
                $sheet->fromArray([$headers], NULL, 'A1');
            
                // Add data to the sheet
                $data = [];
                
                $grandTotal = 0;
                foreach ($transactions as $transaction) {
                    $totalAmount = $transaction->transacts->sum('total_amount');
                    $grandTotal += $totalAmount;
        
                    $data[] = [
                        $transaction->id,
                        $transaction->name,
                        $totalAmount,
                        $transaction->transacts->count(),
                    ];
                }
        
                // dd($data);
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
            break;



            case 'transaction':        
                $fromDate = Carbon::parse($_GET['from'])->startOfDay();
                $toDate = Carbon::parse($_GET['to'])->endOfDay();

                // Fetch transactions within the date range
                $transactions = Transaction::whereBetween('created_at', [$fromDate, $toDate])->get();
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
                    $fileName = 'Transaction Report Export.xlsx';
                    $writer = new Xlsx($spreadsheet);

                    // Stream the file to the browser
                    ob_start();
                    $writer->save('php://output');
                    $content = ob_get_clean();

                    return response($content)
                        ->header('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
                        ->header('Content-Disposition', 'attachment;filename="' . $fileName . '"')
                        ->header('Cache-Control', 'max-age=0');
            break;
            default:
               return redirect()->route('reports');
            break;
        }
    }
        
    public function export_transactions(){
        // Disable PHP timeout and set time limit to 0 (unlimited)
        ini_set('max_execution_time', 0);
        set_time_limit(0);
        ignore_user_abort(true);
        $transactions = Transaction::get();
    
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


    public function delete_transaction(Request $request){
        try {
            $ids = $request->input('ids', []);
            if (!empty($ids)) {
                foreach ($ids as $i) {
                    $t = Transaction::where('id', $i)->first();
                    // dd($t);
                    $t->is_deleted = 1;
                    $t->save();
                }
            }
            session()->flash('success', 'Deleted Successfully');
            return redirect()->back();
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
            return redirect()->back();
        }
    }

    public function delete($id){
        try {
            $t = Transaction::where('id', $id)->first();
            $t->is_deleted = 1;
            $t->save();
            session()->flash('success', 'Deleted Successfully');
            return redirect()->back();
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
            return redirect()->back();
        }
    }

    public function deletePermanent(Request $request){
        try {
            $ids = $request->input('ids', []);
            if (!empty($ids)) {
                foreach ($ids as $i) {
                    Transaction::where('id', $i)->first()->delete();
                }
            }
            session()->flash('success', 'Deleted Successfully');
            return redirect()->back();
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
            return redirect()->back();
        }
    }
    public function restore($id){
        try {
            $t = Transaction::where('id', $id)->first();
            $t->is_deleted = 0;
            $t->save();
            session()->flash('success', 'Restored Successfully');
            return redirect()->back();
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
            return redirect()->back();
        }
    }
}
