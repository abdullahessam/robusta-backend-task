<?php

namespace App\Http\Requests\Api\Reservation;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'dispatch_city_id'=>'required|exists:cities,id',
            'destination_city_id'=>'required|exists:cities,id',
            'trip_id'=>'required|exists:trips,id',
            'seat_no'=>'required|integer|min:1|max:12',
        ];
    }
}
