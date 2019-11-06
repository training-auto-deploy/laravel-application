<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\UserRepository;

class UserController extends Controller
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function profile($id)
    {
        $user = $this->userRepository->find($id);
        $teacher = $user->teacher;
        $schedules = $teacher->schedules()->with('times')->get();
        $subjects = $teacher->subjects;

        return view('user.profile', compact('user', 'schedules', 'subjects', 'teacher'));
    }
}
