<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class UpdatePostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "min:4|max:24|required",
            "description" => "min:12|required"
        ];
    }

    public function messages()
    {
        return [
            "required" => "Поле :attribute является обязательным",
            'min' => "Поле :attribute должно быть больше",
            'max' => "Поле :attribute должно быть меньше"
        ];
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
}
