<?php

namespace App\Models;

use Illuminate\Database\Console\Migrations\StatusCommand;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use StaticMethodFile;
use Carbon\Carbon;

class Internship extends Model
{
    /** @use HasFactory<\Database\Factories\InternshipFactory> */
    use HasFactory;

    protected $fillable = [
        'student_id',
        'industry_id',
        'teacher_id',
        'start',
        'end',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function getDurationAttribute()
    {
        if (!$this->start || !$this->end) {
            return null;
        }
        return Carbon::parse($this->start)->diffInDays(Carbon::parse($this->end)) + 1;
    }

    protected static function booted()
    {
        static::created(function ($internship) {
            if ($internship->student) {
                $internship->student->update([
                    'internship_status' => 1, // on progress
                ]);
            }
        });

        static::deleted(function ($internship) {
            if ($internship->student) {
                $internship->student->update([
                    'internship_status' => 0, // not registered
                ]);
            }
        });
    }
}

