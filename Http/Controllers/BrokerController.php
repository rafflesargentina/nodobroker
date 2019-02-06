<?php

namespace Raffles\Modules\Nodobroker\Http\Controllers;

use Raffles\Modules\Nodobroker\Http\Requests\BrokerRequest;
use Raffles\Modules\Nodobroker\Repositories\BrokerRepository;

use RafflesArgentina\ResourceController\ApiResourceController;

class BrokerController extends ApiResourceController
{
    protected $formRequest = BrokerRequest::class;

    protected $repository = BrokerRepository::class;

    protected $resourceName = 'brokers';
}
