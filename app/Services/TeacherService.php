<?php

namespace App\Services;

use App\Repositories\Interfaces\TeacherRepository;
use App\Services\UserService;

class TeacherService
{
    protected $teacherRepository;
    protected $userService;

    public function __construct(TeacherRepository $teacherRepository, UserService $userService)
    {
        $this->teacherRepository = $teacherRepository;
        $this->userService = $userService;
    }

    public function getAllName($teacherId)
    {
        $userId = $this->teacherRepository->getNameTeacherById($teacherId)->pluck('user_id');

        return $this->userService->getAllNameUserById($userId);
    }

}
