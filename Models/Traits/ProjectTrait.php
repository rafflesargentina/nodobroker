<?php

namespace Raffles\Modules\Nodobroker\Models\Traits;

trait ProjectTrait
{
    /**
     * Get the project base price.
     *
     * @return string
     */
    public function getBasePriceAttribute($value)
    {
        return 'desde U$D '.number_format($value, 0, ',', '.');
    }

    /**
     * Get the project location.
     *
     * @return string
     */
    public function getLocationAttribute()
    {
        return $this->attributes['location'] = $this->city ? $this->city.', '.$this->state :  $this->state.', '.$this->country;
    }
}
