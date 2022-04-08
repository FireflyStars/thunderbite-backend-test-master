<?php

namespace App\Http\Requests\Backstage\Symbols;

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
            'name'   => 'required|unique:App\Models\Symbol,name',
            'image'  => 'required|image',
            // 'image'  => 'required|image|dimensions:max_width=50,max_height=50',
            'points_3_match'  => 'required|numeric',
            'points_4_match'  => 'required|numeric',
            'points_5_match'  => 'required|numeric',
        ];
    }
}
