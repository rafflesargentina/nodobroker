<?php

namespace Raffles\Modules\Nodobroker\Http\Controllers;

use Raffles\Modules\Nodobroker\Repositories\ProjectRepository;

use RafflesArgentina\ResourceController\ApiResourceController;

class ProjectController extends ApiResourceController
{
    protected $repository = ProjectRepository::class;

    protected $resourceName = 'projects';
}
