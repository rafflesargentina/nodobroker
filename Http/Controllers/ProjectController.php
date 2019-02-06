<?php

namespace Raffles\Modules\Nodobroker\Http\Controllers;

use Raffles\Modules\Nodobroker\Http\Requests\ProjectRequest;
use Raffles\Modules\Nodobroker\Repositories\ProjectRepository;

use Illuminate\Http\Request;
use RafflesArgentina\ResourceController\ApiResourceController;

class ProjectController extends ApiResourceController
{
    protected $formRequest = ProjectRequest::class;

    protected $repository = ProjectRepository::class;

    protected $resourceName = 'projects';

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
