<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locker extends Model
{
    public function student()
    {
        return $this->belongsTo(Student::class, 'locker_id');
    }
    use HasFactory;

    protected $fillable = [
        'locker_num'
    ];
}