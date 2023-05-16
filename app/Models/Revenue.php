<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    protected $fillable = [
        'user_id',
        'amount',
        'description',
        'origin',
        "payment_method"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
