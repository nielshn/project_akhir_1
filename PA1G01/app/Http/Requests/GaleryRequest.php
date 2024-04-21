<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GaleryRequest extends FormRequest
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
            'nama' =>[ 'required', 'string', 'min:6', 'regex:/^[a-zA-Z\s]+$/', 'unique:galeri,nama'],
            'description' =>[ 'required','string'],
            'image' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
