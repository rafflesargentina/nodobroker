<?php

namespace Raffles\Modules\Nodobroker\Http\Controllers;

use Raffles\Modules\Nodobroker\Http\Requests\ProjectRequest;
use Raffles\Modules\Nodobroker\Repositories\ProjectRepository;

use RafflesArgentina\ResourceController\ApiResourceController;

class ProjectController extends ApiResourceController
{
    protected $formRequest = ProjectRequest::class;

    protected $repository = ProjectRepository::class;

    protected $resourceName = 'projects';
}
