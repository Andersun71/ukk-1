<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nis',
        'photo',
        'gender',
        'address',
        'contact',
        'internship_status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function internship()
    {
        return $this->hasOne(Internship::class);
    }

    protected static function booted()
    {
        static::created(function ($student) {
            if ($student->user) {
                $student->user->assignRole('Student');
                log::info('assigned role student to user ID' . $student->user->id);
            }
        });
        static::deleted(function ($student) {
            if ($student->user) {
                $student->user->removeRole('Student');
                log::info('Removed role student from user ID' . $student->user->id);
            }
        });
    }
}
