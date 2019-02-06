<?php

namespace Raffles\Modules\Nodobroker\Models;

use Raffles\Models\FeaturedPhoto;
use Raffles\Models\UnfeaturedPhoto;
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
    protected $with = ['featured_photo', 'unfeatured_photos', 'offer_types'];

    /**
     * The brokers that belong to the project.
     */
    public function brokers()
    {
        return $this->belongsToMany(Broker::class, 'project_user', 'project_id', 'user_id');
    }

    /**
     * Get the project's featured photo.
     */
    public function featured_photo()
    {
        return $this->morphOne(FeaturedPhoto::class, 'photoable')->withDefault();
    }

    /**
     * Get the project type that owns the project.
     */
    public function project_type()
    {
        return $this->belongsTo(ProjectType::class);
    }

    /**
     * The offer types that belong to the project.
     */
    public function offer_types()
    {
        return $this->belongsToMany(OfferType::class);
    }

    /**
     * Get all of the project's unfeatured photos.
     */
    public function unfeatured_photos()
    {
        return $this->morphMany(UnfeaturedPhoto::class, 'photoable');
    }
}
