<?php

namespace App\Http\Requests\Publisher;

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
        $id = publisher()->id;
        
        return [
            'firstname' => 'nullable|string',
            'lastname' => 'nullable|string',
            'email' => 'string|email|unique:users,id,'.$id,
            'telephone' => 'nullable|string',
            'password' => 'nullable|string|min:6',
            'confirmPassword' => 'nullable|string|same:password',
        ];
    }

    public function failedValidation(Validator $validator){
        $errors = $validator->errors();

        throw new ApplicationException( $errors->first() );
    }
}
