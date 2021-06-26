<?php

namespace App\Http\Requests\Dashboard\Trip;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'bus_id'=>'required|exists:buses,id',
            'line_id'=>'required|exists:lines,id',
            'date'=>'required|date_format:Y-m-d H:i|after:today'
        ];
    }
}
