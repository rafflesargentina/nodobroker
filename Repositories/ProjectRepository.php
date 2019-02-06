<?php

namespace Raffles\Modules\Nodobroker\Repositories;

use Raffles\Modules\Nodobroker\Models\Project;

use Caffeinated\Repository\Repositories\EloquentRepository;
use Illuminate\Http\Request;

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
            if (!$user || ($user && $user->isAdmin())) {
                return $this->model->with($with)->get($columns);
            }

            return $user->projects;
        });
    }
}
