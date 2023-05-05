<?php

namespace Src\Application\ApplicationServices;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Src\Application\ApplicationServices\Commands\UserChangeCommand;
use Src\Application\ApplicationServices\Commands\UserCreateCommand;
use Src\Infrastructure\Repositories\User\IUserRepository;

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
        return $this->repository->getUser($userId);
    }

    public function updateUser(User $user, UserChangeCommand $command): User
    {
        return $this->repository->updateUser($user, $command);
    }
}
