<?php

namespace Raffles\Modules\Nodobroker\Models\Traits;

trait ProjectTrait
{
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
