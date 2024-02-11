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
        'type',
        'code',
        'icon',
        'amount',
        'user_id',
    ];

    protected static function boot()
    {
        parent::boot();
    
        // Include stream and district relationships when the model is called
        static::retrieved(function ($user) {
            $user->load('user');
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function transacts(){
        return $this->hasMany(Transaction::class, 'stream_id');
    }
}
