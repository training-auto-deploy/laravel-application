<?php

namespace App\Repositories\Interfaces;

interface TeacherRepository extends Repository
{
    public function getNameTeacherById($ids);
}
