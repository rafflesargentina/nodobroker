<?php

namespace Raffles\Modules\Nodobroker\Http\Requests;

use RafflesArgentina\ActionBasedFormRequest\ActionBasedFormRequest;

class BrokerRequest extends ActionBasedFormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'confirmed|min:6',
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
