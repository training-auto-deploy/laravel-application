<?php

namespace App\Repositories;

use App\Models\Classes;
use App\Repositories\Interfaces\ClassRepository;


class EloquentClassRepository extends EloquentRepository implements ClassRepository
{
    public function __construct(Classes $model)
    {
        parent::__construct($model);
    }
    public function getListStudentId($studentId)
    {
        $model = $this->model->where(['student_id' => $studentId])->get();

        return $model;
    }
}
