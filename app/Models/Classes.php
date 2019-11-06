<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
	protected $fillable = [
		'student_id',
		'teacher_id',
		'link_call',
		'status',
		'name',
		'start_time',
		'end_time',
	];
}
