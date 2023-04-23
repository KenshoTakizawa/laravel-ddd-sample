<?php

namespace App\Http\Controllers\Users\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\User\PatchRequest;
use App\Models\User;
use Spatie\RouteAttributes\Attributes\Patch;
use Src\ApplicationServices\UserApplicationService;
use Src\ApplicationServices\Commands\UserChangeCommand;

class PatchController extends Controller
{
    private UserApplicationService $service;

    public function __construct(UserApplicationService $service)
    {
        $this->service = $service;
    }

    #[Patch('api/users/{user}')]
    public function __invoke(PatchRequest $request, User $user)
    {
        $command = new UserChangeCommand(
            $user->getAttributeValue('name'),
            $user->getAttributeValue('email'),
            $user->getAttributeValue('premier'),
        );

        dd($command);
    }
}
