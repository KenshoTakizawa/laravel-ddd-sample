<?php

namespace Src\ApplicationService;

use App\ApplicationService\Commands\UserCreateCommand;
use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Database\Eloquent\Collection;

class UserApplicationService
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
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
}
