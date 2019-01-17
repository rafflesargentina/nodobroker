<?php

namespace Raffles\Modules\Nodobroker\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'name',
        'slug',
    ];

    /**
     * Get the projects for the project type.
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
