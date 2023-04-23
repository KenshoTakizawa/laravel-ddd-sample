<?php

namespace App\Http\Controllers\Users;


use App\Http\Controllers\Controller;
use App\Http\Requests\Users\PostRequest;
use Spatie\RouteAttributes\Attributes\Post;
use Src\ApplicationServices\UserApplicationService;
use Src\ApplicationServices\Commands\UserCreateCommand;

class PostController extends Controller
{
    protected UserApplicationService $service;

    /**
     * @param UserApplicationService $service
     */
    public function __construct(UserApplicationService $service)
    {
        $this->service = $service;
    }

    #[Post('api/users')]
    public function __invoke(PostRequest $request)
    {
        $command = new UserCreateCommand(
            $request->input('name'),
            $request->input('email'),
            $request->input('premier'),
        );

        return $this->service->createUser($command);
    }
}
