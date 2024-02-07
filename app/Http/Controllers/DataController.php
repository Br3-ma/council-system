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
            $t = Transaction::where('machine_id', $id)->get();
            foreach ($t as $key => $row) {
                $data =[
                    "receiptNumber"=> $row->receipt->receipt_number,
                    "revenueStream"=> $row->stream->description,
                    "entity"=> $row->stream->name,
                    "feeAmount"=> $row->total_amount,
                    "paymentType"=> $row->payment_method,
                    "timestamp"=>  $row->created_at,
                    "isSynced"=> $row->is_sync == 1 ? true : false,
                    "machineID"=> $row->machine_id,
                    "customs"=> $row->stream->type,
                    "locationID"=> 1,
                    "revenueStreamID"=> $row->stream->id
                ];
            }
            
            return response()->json(['receipts' => $data]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    
}
