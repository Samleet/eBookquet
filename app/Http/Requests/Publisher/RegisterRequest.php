<?php

namespace App\Http\Requests\Publisher;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Exceptions\ApplicationException;

class RegisterRequest extends FormRequest
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
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string|email|unique:publishers,email',
            'telephone' => 'nullable|string|unique:publishers,telephone',
            'password' => 'required|string|min:6',
            'confPassword' => 'required|string|same:password',
        ];
    }

    public function failedValidation(Validator $validator){
        $errors = $validator->errors();

        throw new ApplicationException( $errors->first() );
    }
}
