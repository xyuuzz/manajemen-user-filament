<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        "user_id",
        "amount",
        "description",
        "purpose",
        "payment_method",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
