<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashbaordController extends Controller
{
    public function collections_by_streams(Request $request)
    {
        $series = [];
        $categories = [];
    
        // Fetch the last 28 transactions and group by created_at date
        $groupedTransactions = Transaction::where('is_deleted', 0)->orderBy('created_at', 'desc')
            ->take(28)
            ->get()
            ->groupBy('created_at');

        // dd($groupedTransactions);
    
        // Extract series and categories arrays
        $series = $groupedTransactions->map(function ($group) {
            return $group->sum('total_amount');
        })->values()->toArray();
    
        $categories = $groupedTransactions->keys()->toArray();
    
        return response()->json(['series' => $series, 'categories' => $categories]);
    }
    
    
}
