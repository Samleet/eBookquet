<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Exceptions\ApplicationException;

class ProfileRequest extends FormRequest
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
        $id = auth()->user()->id;
        
        return [
            'firstname' => 'nullable|string',
            'lastname' => 'nullable|string',
            'email' => 'nullable|string|email|unique:users,email,'.$id,
            'telephone' => 'nullable|string',
            'password' => 'nullable|string|min:6',
            'confirmPassword' => 'nullable|string|same:confirmPassword',
            'pin_code' => 'nullable|digits:4'
        ];
    }

    public function failedValidation(Validator $validator){
        $errors = $validator->errors();

        throw new ApplicationException( $errors->first() );
    }
}
