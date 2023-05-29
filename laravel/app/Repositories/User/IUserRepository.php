<?php

namespace App\Repositories\User;


use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Src\ApplicationServices\Commands\UserChangeCommand;
use Src\ApplicationServices\Commands\UserCreateCommand;

interface IUserRepository
{
    public function create(UserCreateCommand $command): User;

    public function getUsers(): Collection;

    public function updateUser(User $user, UserChangeCommand $command): User;

    public function deleteUser(User $user): void;
}
