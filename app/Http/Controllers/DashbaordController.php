<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class DashbaordController extends Controller
{
    public function collections_by_streams(Request $request)
    {
        $series = [];
        $categories = [];
        $groupedTransactions = [];
        // Fetch transactions within the date range and group by created_at date
        $groupedTransactions = Transaction::orderBy('created_at')
            ->get()
            ->groupBy(function ($transaction) {
                return $transaction->created_at->format('F j, Y'); // Format as "Month day, Year"
            });

        // Extract series and categories arrays
        $series = $groupedTransactions->map(function ($group) {
            return $group->sum('total_amount');
        })->values()->toArray();

        $categories = $groupedTransactions->keys()->toArray();

        return response()->json(['series' => $series, 'categories' => $categories]);
    }
}
