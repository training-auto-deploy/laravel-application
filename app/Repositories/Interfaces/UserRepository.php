<?php

namespace App\Repositories\Interfaces;

use App\Models\User;
use App\Repositories\Interfaces\Repository;

interface UserRepository extends Repository
{
    public function getNameUserById($userId);
}
