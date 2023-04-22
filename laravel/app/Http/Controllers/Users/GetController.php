<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Spatie\RouteAttributes\Attributes\Get;
use Src\ApplicationService\UserApplicationService;

class GetController extends Controller
{

    private UserApplicationService $service;

    public function __construct(UserApplicationService $service)
    {
        $this->service = $service;
    }

    #[Get('api/users')]
    public function __invoke(): Collection
    {
        return $this->service->getUsers();
    }
}
