<?php

namespace Raffles\Modules\Nodobroker\Models;

use Illuminate\Database\Eloquent\Model;

class OfferType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'color',
        'description',
        'name',
        'slug',
    ];

    /**
     * The projects that belong to the offer type.
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
