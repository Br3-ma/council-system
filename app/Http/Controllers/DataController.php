<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Reciept;
use App\Models\Stream;
use App\Models\Transaction;
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
    public function get_receipts($id)
    {
        try {
            $data = [];
            $transactions = Transaction::where('machine_id', $id)->get();
    
            foreach ($transactions as $key => $transaction) {
                $data[] = [
                    "receiptNumber" => $transaction->receipt->receipt_number,
                    "revenueStream" => $transaction->stream->description,
                    "entity" => $transaction->stream->name,
                    "feeAmount" => $transaction->total_amount,
                    "paymentType" => $transaction->payment_method,
                    "timestamp" => $transaction->created_at,
                    "isSynced" => $transaction->is_sync == 1 ? true : false,
                    "machineID" => $transaction->machine_id,
                    "customs" => $transaction->stream->type,
                    "locationID" => 1,
                    "revenueStreamID" => $transaction->stream->id
                ];
            }
            
            return response()->json(['receipts' => $data]);
        } catch (\Throwable $th) {
            // Handle the exception appropriately, e.g., log or return an error response
            return response()->json(['error' => 'An error occurred.'.$th->getMessage()], 500);
        }
    }    
}
