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
        $this->belongsTo(User::class);
    }
}
