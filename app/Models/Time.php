<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $guarded = ['id'];

    public function getTimeStringAttribute()
    {
    	return Carbon::createFromFormat('H:s:i', $this->time)->format('H:s');
    }

    public function schedule()
    {
    	return $this->belongsTo(Schedule::class);
    }
}
