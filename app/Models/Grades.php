<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    protected $tables = 'grades';
    protected $fillables = [
    	'id',
    	'name'
    ];
}
