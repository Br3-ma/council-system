<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'admin_id',
        'created_by',
        'comments',
        'address',
        'status',
        'is_deleted'
    ];

    public function admin(){
        $this->belongsTo(User::class, 'admin_id');
    }

    public function user(){
        $this->belongsTo(User::class);
    }
}
