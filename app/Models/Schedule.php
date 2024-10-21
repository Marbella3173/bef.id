<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $table = 'schedules';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

    protected $fillable = [
        'userID',
        'scheduleName',
        'scheduleDeadline',
        'scheduleType',
        'scheduleSubmissionName',
        'zoomLink',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }
}
