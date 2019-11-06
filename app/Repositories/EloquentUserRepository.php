<?php

namespace App\Repositories;

use App\User;
use App\Repositories\Interfaces\UserRepository;

class EloquentUserRepository extends EloquentRepository implements UserRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function getNameUserById($userId)
    {
       return $this->model->whereIn('id', $userId)->get();
    }
}
