<?php

namespace Raffles\Modules\Nodobroker\Models;

use Raffles\Modules\Nodobroker\Models\Traits\ProjectTrait;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use ProjectTrait;

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'location',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'base_price',
        'city',
        'country',
        'description',
        'entertainment',
        'featured',
        'gas',
        'investment',
        'light',
        'name',
        'place',
        'project_type_id',
        'resume',
        'slug',
        'state',
        'total_area',
        'user_id',
        'water',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['featuredPhoto', 'unfeaturedPhotos', 'offerTypes'];

    /**
     * Get the project's featured photo.
     */
    public function featuredPhoto()
    {
        return $this->morphOne(\Raffles\Models\FeaturedPhoto::class, 'photoable');
    }

    /**
     * Get the project type that owns the project.
     */
    public function projectType()
    {
        return $this->belongsTo(ProjectType::class);
    }

    /**
     * The offer types that belong to the project.
     */
    public function offerTypes()
    {
        return $this->belongsToMany(OfferType::class);
    }

    /**
     * Get all of the project's unfeatured photos.
     */
    public function unfeaturedPhotos()
    {
        return $this->morphMany(\Raffles\Models\Photo::class, 'photoable')->where('featured', '0');
    }
}
