<?php

namespace App\Http\Controllers\User;

use App\Services\ClassService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\Time;
use Carbon\Carbon;
use Auth;

class BookingController extends Controller
{

    protected $classService;

    public function __construct(ClassService $classService)
    {
        $this->classService = $classService;
    }

    public function saveClass(Request $request)
    {
        $time = Time::findOrFail($request->time);
        $start = $time->schedule->date . ' ' . $time->time;
        $data = [
            'student_id' => Auth::id(),
            'teacher_id' => $request->teacher,
            'start_time' => $start,
            'end_time' => Carbon::parse($start)->addHour(2),
            'status' => 0,
            'link_call' => 'https://meet.google.com/hep-zacz-dhg',
            'name' => Subject::findOrFail($request->subject)->name,
        ];

    	$class = Classes::create($data);

        return redirect()->route('students.classes');
    }

    public function getListClassByStudentId()
    {
        $id = Auth::id();
        if ($id) {
            $datas = $this->classService->getListClassByStudentId($id);

            return view('user.student.listBooking', compact(['datas']));
        }

        return redirect()->home();
    }
}
