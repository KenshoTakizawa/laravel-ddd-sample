<?php

namespace App\Http\Controller\User\User;


use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\RouteAttributes\Attributes\Delete;
use Spatie\RouteAttributes\Attributes\Get;
use Src\ApplicationServices\UserApplicationService;

class DeleteController extends Controller
{

    private UserApplicationService $service;

    public function __construct(UserApplicationService $service)
    {
        $this->service = $service;
    }

    #[Delete('api/users/{user}')]
    public function __invoke(User $user)
    {
        $this->service->deleteUser($user);
    }
}
