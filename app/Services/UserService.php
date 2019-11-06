<?php

namespace App\Services;

use App\Repositories\Interfaces\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllNameUserById($ids)
    {
        $names = $this->userRepository->getNameUserById($ids)->pluck('name', 'id');

        return $names;
    }

}
