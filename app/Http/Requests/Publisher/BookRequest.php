<?php

namespace App\Http\Requests\Publisher;

use App\Enums\Book;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Exceptions\ApplicationException;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = request()->id;
        $method = request()->method();
        $genres = implode(
            ',', publisher()->genres->pluck('id')->toArray()
        );
        
        $rules = [
            'author' => 'nullable|string',
            'title' => 'required|string',
            'genre' => 'required|string|in:'.$genres,
            'type' => 'required|string',
            'price' => 'required_if:type,'.Book::RENTAL,
            'status' => 'required',
            'source' => 'required|file|mimes:pdf,epub',
            'photo' => 'required|file|image',
        ];

        if($id){
            $rules['source'] = 'file|mimes:pdf,epub';
            $rules['photo'] = 'file|image';
        }

        return $rules;
    }

    public function failedValidation(Validator $validator){
        $errors = $validator->errors();

        throw new ApplicationException( $errors->first() );
    }
}
