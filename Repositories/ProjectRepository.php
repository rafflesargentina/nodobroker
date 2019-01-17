<?php

namespace Raffles\Modules\Nodobroker\Repositories;

use Raffles\Modules\Nodobroker\Models\Project;

use Caffeinated\Repository\Repositories\EloquentRepository;

class ProjectRepository extends EloquentRepository
{
    /**
     * @var Model
     */
    public $model = Project::class;

    /**
     * @var array
     */
    public $tag = ['Project'];
}
