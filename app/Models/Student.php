<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

    protected $fillable = [
        'userID',
        'studentName', 
        'parentName', 
        'phoneNumber', 
        'parentEmail', 
        'address',
        'isPendaftaranChecked', 
        'isSelfActiveLearningChecked', 
        'isBiayaChecked', 
        'additionalQuestion'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }
}
