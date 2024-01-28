<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'province_id',
        'name',
        'created_by',
        'comments',
        'map',
        'status',
        'is_deleted'
    ];

    public function user(){
        $this->belongsTo(User::class);
    }

    public function transacts(){
        return $this->hasMany(Transaction::class, 'district_id');
    }
}
