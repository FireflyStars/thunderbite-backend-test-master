<?php

namespace App\Http\Requests\Backstage\Symbols;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'name'   => ['required', Rule::unique('symbols')->ignore($this->symbol)],
            'image'  => 'image',
            'points_3_match'  => 'required|numeric',
            'points_4_match'  => 'required|numeric',
            'points_5_match'  => 'required|numeric',
        ];        
    }
}
