<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherSubjects extends Model
{
    protected $tables = "teacher_subjects";
    protected $fillable = [
    	'id',
    	'teacher_id',
    	'subject_id'
    ];
}
