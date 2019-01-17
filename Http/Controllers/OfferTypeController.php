<?php

namespace Raffles\Modules\Nodobroker\Http\Controllers;

use Raffles\Modules\Nodobroker\Repositories\OfferTypeRepository;

use RafflesArgentina\ResourceController\ApiResourceController;

class OfferTypeController extends ApiResourceController
{
    protected $repository = OfferTypeRepository::class;

    protected $resourceName = 'offer-types';
}
