<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Grades;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TeacherSubjects;
use Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
    	$request = $request->all();
    	$teachers = Teacher::orderBy('id','ASC');
    	if (isset($request['grades'])) {
    		$teacherIds = [];
    		foreach ($teachers as $key => $teacher) {
    			$grade = array_intersect($request['grades'], $teacher->grade);
    			if (!empty($grade)) {
    				$teacherIds[] = $teacher->id;
    			}
    			$teachers = $teachers->whereIn('id', $teacherIds)->get();
    		}
    	}

    	if (isset($request['subjects'])) {
    		$teacherIds = TeacherSubjects::whereIn('subject_id', $request['subjects'])->pluck('teacher_id');
    		$teachers =  $teachers->whereIn('id', $teacherIds);
    	}
    	$grades = Grades::get();
    	$subjects = Subject::all();
    	$teachers = $teachers->paginate(10);

    	return view('home', compact('grades','subjects','teachers','request'));
    }
}
