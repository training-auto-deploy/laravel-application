<?php

namespace App\Http\Controllers\User;

use Auth;
use App\User;
use Carbon\Carbon;
use App\Models\Teacher;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class CalendarController extends Controller
{
    public function index()
    {
        $hours = range(0, 23);
        $today = Carbon::now()->format('Y-m-d');

        return view('user.teacher.calendar', compact('hours', 'today'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        if ($user->role != 'teacher' || !$user->teacher) {
            return abort(Response::HTTP_FORBIDDEN);
        }

        $inputs = collect($request->all())->groupBy('date');

        foreach ($inputs as $date => $value) {
            $schedule = Schedule::create([
                'date' => $date,
                'schedule_type' => Teacher::class,
                'schedule_id'=> $user->teacher->id,
            ]);

            $hours = [];

            foreach ($value as $time) {
                $hours = array_merge($hours, range((int) $time['from'], (int) $time['to']));
            }

            $hours = array_unique($hours);

            $times = [];

            foreach ($hours as $hour) {
                $times[] = ['time' => Carbon::createFromTime($hour, 0, 0)];
            }

            $schedule->times()->createMany($times);
        }

        return response(null, Response::HTTP_OK);
    }
}
