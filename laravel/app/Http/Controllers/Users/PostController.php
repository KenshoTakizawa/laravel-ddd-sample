<?php

namespace App\Http\Controllers\Users;


use App\ApplicationService\Commands\UserCreateCommand;
use App\ApplicationService\UserApplicationService;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;
use Spatie\RouteAttributes\Attributes\Post;

class PostController extends Controller {
    /**
     * @var UserRepository
     */
    private UserRepository $users;

    protected UserApplicationService $service;

    /**
     * @param UserRepository $users
     * @param UserApplicationService $service
     */
    public function __construct(UserRepository $users, UserApplicationService $service)
    {
        $this->users = $users;
        $this->service = $service;
    }

    #[Post('api/users')]
    public function __invoke(PostRequest $request)
    {
        dd(1);
        $command = new UserCreateCommand(
          $request->input('name'),
          $request->input('email'),
          $request->input('premier'),
        );

        return $this->service->createUser($command);
    }
}
