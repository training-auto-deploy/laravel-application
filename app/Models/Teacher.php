<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';
    protected $guarded = ['id'];
    protected $casts = [
        'grade' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function schedules()
    {
        return $this->morphMany(Schedule::class, 'schedule');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teacher_subjects');
    }
}
