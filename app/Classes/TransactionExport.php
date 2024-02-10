<?php

namespace App\Classes\Exports;

use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransactionExport implements FromView
{
    public $status, $type;

    public function __construct(array $status, array $type)
    {
        $this->status = $status;
        $this->status = $type;
    }

    public function collection()
    {
            return Transaction::whereIn('status', $this->status)
            ->whereIn('type', $this->type)
            ->get([
                'stream_id',
                'terminal_id',
                'machine_id',
                'transaction_date',
                'category',
                'entity',
                'total_amount',
                'payment_method',
                'payment_status',
                'created_at',
                'updated_at'
            ]);

    }

    public function headings(): array
    {
        return [
            'stream_id',
            'terminal_id',
            'machine_id',
            'transaction_date',
            'category',
            'entity',
            'total_amount',
            'payment_method',
            'payment_status',
            'created_at',
            'updated_at'
        ];
    }

}