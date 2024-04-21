<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeritaRequest extends FormRequest
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
            'judulBerita' => 'required|min:4|string',
            'body' => 'required|min:8|string',
            'kategori_id' => 'required',
            'gambar_berita' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ];
    }
}
