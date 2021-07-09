<?php

namespace moviemega\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
            'nombre' => 'required|max: 45',
            'portada' => 'required|image',
            'sinopsis'=>'required|max: 2500',
            'calidad' => 'required|max: 45',
            'fechaestreno' => 'required',
            'trailer' => 'required',
            'estrella' => 'required',
            'category_id' => 'required'
        ];
    }
}
