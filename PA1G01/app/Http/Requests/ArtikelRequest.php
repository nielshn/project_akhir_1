<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtikelRequest extends FormRequest
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

    public function rules()
    {
        return [
            'judul' => 'required|min:4|string',
            'body' => 'required|min:8|string',
            'kategori_id' => 'required',
            'gambar_article' => 'required|image|mimes:jpeg,png,jpg|max:4096',
        ];
    }
}
