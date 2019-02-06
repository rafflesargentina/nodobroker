<?php

namespace Raffles\Modules\Nodobroker\Repositories;

use Raffles\Modules\Nodobroker\Models\User;

use Caffeinated\Repository\Repositories\EloquentRepository;

class UserRepository extends EloquentRepository
{
    /**
     * @var Model
     */
    public $model = User::class;

    /**
     * @var array
     */
    public $tag = ['User'];
}
