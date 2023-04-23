<?php

namespace App\Repositories\User;


use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Src\ApplicationServices\Commands\UserCreateCommand;

Interface IUserRepository
{
    public function create(UserCreateCommand $command): User;

    public function getUsers(): Collection;
}
