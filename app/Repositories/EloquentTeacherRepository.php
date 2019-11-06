<?php

namespace App\Repositories;

use App\Models\Teacher;
use App\Repositories\Interfaces\TeacherRepository;


class EloquentTeacherRepository extends EloquentRepository implements TeacherRepository
{
    public function __construct(Teacher $model)
    {
        parent::__construct($model);
    }

    public function getNameTeacherById($ids)
    {
        return $this->model->whereIn('id', $ids)->get();
    }
}
