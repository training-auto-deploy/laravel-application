<?php

namespace App\Repositories\Interfaces;

interface ClassRepository extends Repository
{
    public function getListStudentId($studentId);
}
