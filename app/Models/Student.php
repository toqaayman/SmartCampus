<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'name',
        'email',
    ];
    protected $table = 'students';
    protected $primaryKey = 'id';
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($student) {
            $student->NFCnum = Str::random(8); // generate an 8-character random string
        });
        
    }
    public function locker()
    {
        return $this->belongsTo(Locker::class);
    }
}
