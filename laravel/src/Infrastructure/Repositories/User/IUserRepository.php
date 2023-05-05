<?php

namespace Src\Infrastructure\Repositories\User;


use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Src\Application\ApplicationServices\Commands\UserChangeCommand;
use Src\Application\ApplicationServices\Commands\UserCreateCommand;

Interface IUserRepository
{
    public function create(UserCreateCommand $command): User;

    public function getUsers(): Collection;

    public function updateUser(User $user, UserChangeCommand $command): User;

    public function getUser(int $userId): User;
}
