<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
         //$this->route('user') obtenim l'usuari complet
         $rules = [
            'name' => ['required', 'regex:/^[A-ZÀÁÇÉÈËÏÍÌÓÒÚÙÜÚÑa-zàáçéèëïíóòúüñ. ]+$/','min:4'],
            'avatar' =>'image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:max_width=300,max_height=300',
            //Comprovem que el email sigui unic ignorant el propi email
            'email' => ['required', Rule::unique('users')->ignore($this->route('user')->id)]
        ];

        //Comprovem si l'usuari vol canviar el password
        if($this->filled('password') || $this->filled('password_confirmation')){
            $rules['password'] = ['confirmed', 'min:6'];
        }


        return $rules;

    }
}
