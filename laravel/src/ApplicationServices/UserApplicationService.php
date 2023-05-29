<?php

namespace Src\ApplicationServices;

use App\Models\User;
use App\Repositories\User\IUserRepository;
use Illuminate\Database\Eloquent\Collection;
use Src\ApplicationServices\Commands\UserChangeCommand;
use Src\ApplicationServices\Commands\UserCreateCommand;

class UserApplicationService
{
    private IUserRepository $repository;

    public function __construct(IUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createUser(UserCreateCommand $command): User
    {
        return $this->repository->create($command);
    }

    public function getUsers(): Collection
    {
        return $this->repository->getUsers();
    }

    public function getUser(int $userId): User
    {
        return User::find($userId);
    }

    public function updateUser(User $user, UserChangeCommand $command): User
    {
        return $this->repository->updateUser($user, $command);
    }

    public function deleteUser(User $user): void
    {
        $this->repository->deleteUser($user);
    }
}
