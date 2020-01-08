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
            'pickup_address'   => 'required',
            'drop_address'     => 'required',
            'vehicle_id'       => 'required',
            'driver_id'        => 'required',
            'pickup_sign'      => 'required',
            'pickup_hour'      => 'required',
            'pickup_min'       => 'required',
            'flight_number'    => 'required',
            'date'             => 'required',
        ];
    }
}
