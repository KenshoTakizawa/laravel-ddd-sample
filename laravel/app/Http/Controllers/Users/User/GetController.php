<?php

namespace App\Http\Controllers\Users\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\RouteAttributes\Attributes\Get;
use Src\Application\ApplicationServices\UserApplicationService;

class GetController extends Controller
{
    private UserApplicationService $service;

    public function __construct(UserApplicationService $service)
    {
        $this->service = $service;
    }

    #[Get('api/users/{user}')]
    public function __invoke(User $user)
    {
        return $this->service->getUser($user->getAttributeValue('id'));
    }
}
