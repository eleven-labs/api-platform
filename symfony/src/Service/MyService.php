<?php

namespace App\Service;

use App\Entity\User;

class MyService
{
    public function doSomething(User $data)
    {
        $data->setName("test");

        return $data;
    }
}