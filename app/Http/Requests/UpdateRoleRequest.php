<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends FormRequest
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
        $rules = [
            //Com que name està deshabilitat al form no cal comprovar 'name'
            //'name' => ['required', Rule::unique('roles')->ignore($this->route('role')->id)],
            'display_name' => 'required',
            // 'guard_name' => 'required'
        ];

        return $rules;
    }

    /**
    * Get the error messages for the defined validation rules.
     *
    * @return array
    */
    public function messages()
    {
        return [
            'display_name.required' => 'El campo Nombre es obligatorio',
        ];
    }
}
