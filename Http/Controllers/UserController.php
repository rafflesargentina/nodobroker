<?php

namespace Raffles\Modules\Nodobroker\Http\Controllers;

use Raffles\Modules\Nodobroker\Http\Requests\UserRequest;
use Raffles\Modules\Nodobroker\Repositories\UserRepository;

use RafflesArgentina\ResourceController\ApiResourceController;

class UserController extends ApiResourceController
{
    protected $formRequest = UserRequest::class;

    protected $repository = UserRepository::class;

    protected $resourceName = 'users';
}
