<?php

namespace App\Http\Requests;

use App\Models\HallAttribute;
use Illuminate\Foundation\Http\FormRequest;

class HallStoreRequest extends ApiRequest
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
            "types" => "required|array",
            "types.*" => "exists:hall_types,id",
            "images" => "required|array",
            "guest_count_min" => "integer|between:1,1000000",
            "guest_count_max" => "integer|between:1,1000000",
            "price_min" => "integer|between:0,1000000",
            "price_max" => "integer|between:0,1000000",
            "coords" => "required|array",
            "phones" => "required|array",
            "attributes" => "required|array",
            "attributes.*" => "exists:hall_attributes,id",
            "address" => "required",
            "region" => "required",
            "review" => "required|numeric|between:0,5",
        ];
    }

}
