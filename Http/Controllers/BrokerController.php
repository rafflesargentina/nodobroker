<?php

namespace Raffles\Modules\Nodobroker\Http\Controllers;

use Raffles\Modules\Nodobroker\Http\Requests\BrokerRequest;
use Raffles\Modules\Nodobroker\Repositories\BrokerRepository;

use Illuminate\Http\Request;
use RafflesArgentina\ResourceController\ApiResourceController;

class BrokerController extends ApiResourceController
{
    protected $formRequest = BrokerRequest::class;

    protected $repository = BrokerRepository::class;

    protected $resourceName = 'brokers';

    /**
     * Display a listing of the resource.
     *
     * @param Request $request The request object.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $this->getFormRequestInstance();

        $items = $this->repository->getAll($request);

        return $this->validSuccessJsonResponse('Success', $items);
    }
}
