<?php

namespace App\Repositories\Classes;

use App\Repositories\Interfaces\UserRepositoryContract;
use App\Models\User;

class UserRepository extends Repository implements UserRepositoryContract
{
    public function model()
    {
        return User::class;
    }
}
