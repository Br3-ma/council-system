<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaction_id',
        'type',
        'vehicleRegNumber',
        'name',
        'status',
        'is_deleted'
    ];

    public function user(){
        $this->belongsTo(User::class);
    }
    public function transaction(){
        $this->belongsTo(Transaction::class, 'transaction_id');
    }
}
