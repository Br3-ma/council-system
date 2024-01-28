<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions'; // Assuming your table is named 'transactions'

    protected $fillable = [
        'stream_id',
        'customer_id',
        'employee_id',
        'terminal_id',
        'machine_id',
        'district_id',
        'transaction_date',
        'category',
        'entity',
        'total_amount',
        'discount_amount',
        'tax_amount',
        'net_amount',
        'payment_method',
        'payment_status',
        'is_sync',
    ];

    protected static function boot()
    {
        parent::boot();
    
        // Include stream and district relationships when the model is called
        static::retrieved(function ($transaction) {
            $transaction->load('stream', 'district', 'receipt');
        });
    }
    
    

    public function stream()
    {
        return $this->belongsTo(Stream::class, 'stream_id');
    }
    public function district()
    {
        return $this->belongsTo(District::class, 'stream_id');
    }
    public function receipt()
    {
        return $this->hasOne(Reciept::class, 'transaction_id');
    }

    // Define relationships with other models
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

}