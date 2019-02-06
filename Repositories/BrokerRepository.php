<?php

namespace Raffles\Modules\Nodobroker\Repositories;

use Raffles\Modules\Nodobroker\Models\Broker;

use Caffeinated\Repository\Repositories\EloquentRepository;

class BrokerRepository extends EloquentRepository
{
    /**
     * @var Model
     */
    public $model = Broker::class;

    /**
     * @var array
     */
    public $tag = ['Broker'];
}
