<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'person_concerned',
        'meeting_place',
        'meeting_place',
        'agenda',
        'meeting_date',
        'meeting_time',
        'meeting_note',
        'meeting_status',
        'meeting_result'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
