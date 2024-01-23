<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penalty extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'transaction_id',
        'comments',
        'amount',
        'due_date',
        'status',
        'is_deleted'
    ];

    public function user(){
        $this->belongsTo(User::class);
    }
}
