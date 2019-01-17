<?php

namespace Raffles\Modules\Nodobroker\Repositories;

use Raffles\Modules\Nodobroker\Models\ProjectType;

use Caffeinated\Repository\Repositories\EloquentRepository;

class ProjectTypeRepository extends EloquentRepository
{
    /**
     * @var Model
     */
    public $model = ProjectType::class;

    /**
     * @var array
     */
    public $tag = ['ProjectType'];
}
