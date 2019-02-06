<?php

namespace Raffles\Modules\Nodobroker\Http\Requests;

use RafflesArgentina\ActionBasedFormRequest\ActionBasedFormRequest;

class ProjectRequest extends ActionBasedFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to store action.
     *
     * @return array
     */
    public static function store()
    {
        return [
            'description' => 'required',
            'name' => 'required',
            'city' => 'required_without:state',
            'country' => 'required',
            'state' => 'required_without:city',
            'total_area' => 'required|numeric',
        ];
    }

    /**
     * Get the validation rules that apply to update action.
     *
     * @return array
     */
    public static function update()
    {
        return static::store();
    }
}
