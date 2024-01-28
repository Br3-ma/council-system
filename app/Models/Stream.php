<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'is_deleted',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function transacts(){
        return $this->hasMany(Transaction::class, 'stream_id');
    }
}
