<?php

namespace Raffles\Modules\Nodobroker\Repositories;

use Raffles\Modules\Nodobroker\Models\OfferType;

use Caffeinated\Repository\Repositories\EloquentRepository;

class OfferTypeRepository extends EloquentRepository
{
    /**
     * @var Model
     */
    public $model = OfferType::class;

    /**
     * @var array
     */
    public $tag = ['OfferType'];
}
