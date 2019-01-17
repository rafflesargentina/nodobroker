<?php

namespace Raffles\Modules\Nodobroker\Http\Controllers;

use Raffles\Modules\Nodobroker\Repositories\ProjectTypeRepository;

use RafflesArgentina\ResourceController\ApiResourceController;

class ProjectTypeController extends ApiResourceController
{
    protected $repository = ProjectTypeRepository::class;

    protected $resourceName = 'project-types';
}
