<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reciept extends Model
{
    use HasFactory;
    // protected $table = 'receipts'; // Assuming your table is named 'receipts'

    protected $fillable = [
        'transaction_id',
        'receipt_date',
        'total_amount',
        'discount_amount',
        'tax_amount',
        'net_amount',
        'payment_method',
        'payment_status',
        'change_amount',
        'printed_by_employee_id',
        'printed_date',
        'additional_notes',
        'voided',
    ];

    // Define relationships with other models
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    // public function customer()
    // {
    //     return $this->belongsTo(Customer::class, 'customer_id');
    // }

    // public function employee()
    // {
    //     return $this->belongsTo(Employee::class, 'employee_id');
    // }

    // public function terminal()
    // {
    //     return $this->belongsTo(POSTerminal::class, 'terminal_id');
    // }

    // public function printedByEmployee()
    // {
    //     return $this->belongsTo(Employee::class, 'printed_by_employee_id');
    // }
}
