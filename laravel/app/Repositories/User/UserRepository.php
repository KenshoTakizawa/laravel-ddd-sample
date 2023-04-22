<?php

namespace App\Repositories\User;


use App\ApplicationService\Commands\UserCreateCommand;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserRepository {
    /**
     * Associated Repository Model.
     */
    const MODEL = User::class;

    /**
     * @param UserCreateCommand $command
     * @throws \Exception
     */
    public function create(UserCreateCommand $command): User
    {
        $user = $this->createUserStub($command);

        DB::transaction(function () use ($user) {
            if ($user->save()) {

                return true;
            }

            throw new \Exception();
        });

        return $user;
    }

    /**
     * @param UserCreateCommand $command
     *
     * @return Model
     */
    protected function createUserStub(UserCreateCommand $command): User
    {
        $user = self::MODEL;
        $user = new $user();
        $user->name = $command->getName();
        $user->email = $command->getEmail();
        $user->premier = $command->isPremier();

        return $user;
    }

    /**
     * @return Collection<>
     */
    public function getUsers(): Collection
    {
        return User::all();
    }
}
