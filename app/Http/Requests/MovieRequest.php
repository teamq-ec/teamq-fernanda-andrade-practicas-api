<?php

namespace App\Http\Requests;

use App\Helpers\Catalogs;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MovieRequest extends FormRequest
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
            'title'=>['required','min:3',Rule::unique('movies')->ignore($this->movie)],
            'description'=>['required'],
            'genre'=>['required','min:3', Rule::in(Catalogs::GENRES)],
            'publish_at'=>['required','date'],
            'director_id'=>['required']
        ];
    }
}
