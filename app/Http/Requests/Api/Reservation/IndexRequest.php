<?php

namespace App\Http\Requests\Api\Reservation;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
            'date_from'=>'required|date',
            'date_to'=>'required|date|after:date_form',
            'dispatch_city_id'=>'required|exists:cities,id',
            'destination_city_id'=>'required|exists:cities,id'
        ];
    }
}
