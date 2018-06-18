<?php

namespace App\Controller;

use App\Entity\User;
use App\Service\MyService;

class UserSpecial
{
    private $myService;

    public function __construct(MyService $myService)
    {
        $this->myService = $myService;
    }

    public function __invoke(User $data): User
    {
        $this->myService->doSomething($data);

        return $data;
    }
}