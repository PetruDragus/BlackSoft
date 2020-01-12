<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingStoreRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pickup_address'   => '',
            'drop_address'     => '',
            'vehicle_id'       => '',
            'driver_id'        => '',
            'pickup_sign'      => '',
            'pickup_hour'      => '',
            'pickup_min'       => '',
            'flight_number'    => '',
            'date'             => '',
        ];
    }
}
