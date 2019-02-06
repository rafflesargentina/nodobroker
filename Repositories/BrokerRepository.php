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

    /**
     * Get all entities.
     *
     * @param array $columns
     * @param array $with
     */
    public function getAll($request, $columns = ['*'], $with = [])
    {
        $user = $request->user('api');

        $cacheKey = $this->generateKey([$columns, $user, $with]);

        return $this->cacheResults(get_called_class(), __FUNCTION__, $cacheKey, function () use ($columns, $user, $with) {
            if ($user && $user->isAdmin()) {
                return $this->model->with($with)->get($columns);
            }

            return collect([]);
        });
    }
}
