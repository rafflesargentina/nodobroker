<?php

namespace Raffles\Modules\Nodobroker\Models;

use Raffles\Models\User as BaseUser;

class User extends BaseUser
{
    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['avatar', 'permissions', 'projects', 'roles'];

    /**
     * The projects that belong to the user.
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
