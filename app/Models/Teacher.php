<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;

class Teacher extends Model
{
    /** @use HasFactory<\Database\Factories\TeacherFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nip',
        'gender',
        'address',
        'contact',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function internship()
    {
        return $this->hasMany(Internship::class);
    }

    protected static function booted()
    {
        static::created(function ($teacher) {
            if ($teacher->user) {
                $teacher->user->assignRole('Teacher');
                log::info('assigned role teacher to user ID' . $teacher->user->id);
            }
        });
        static::deleted(function ($teacher) {
            if ($teacher->user) {
                $teacher->user->removeRole('Teacher');
                log::info('Removed role teacher from user ID' . $teacher->user->id);
            }
        });
    }
}
