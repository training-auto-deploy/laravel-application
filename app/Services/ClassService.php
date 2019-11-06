<?php

namespace App\Services;

use App\Repositories\Interfaces\ClassRepository;
use App\Services\TeacherService;
use Carbon\Carbon;

class ClassService
{
    protected $classRepository;
    protected $teacherService;

    public function __construct(ClassRepository $classRepository, TeacherService $teacherService)
    {
        $this->classRepository = $classRepository;
        $this->teacherService = $teacherService;
    }

    public function getListClassByStudentId($studentId)
    {
        $listClass = [];
        $datas = $this->classRepository->getListStudentId($studentId);
        $teacherId = $datas->pluck('teacher_id');
        $nameTeacher = $this->teacherService->getAllName($teacherId)->toArray();

        foreach ($datas as $data) {

            $listClass[] = [
                'teacher_name' => $nameTeacher[$data->teacher_id] ?? '',
                'name' => $data->name,
                'link_call' => $data->link_call,
                'description' => $data->description,
                'status' => config('setting.class.status')[$data->status],
                'start_time' => Carbon::parse($data->start_time)->format('Y-m-d H:i'),
                'end_time' => Carbon::parse($data->end_time)->format('Y-m-d H:i'),
            ];
        }

        return $listClass;
    }
}
