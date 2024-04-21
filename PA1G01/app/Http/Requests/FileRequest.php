<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
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
            'namaFile' => 'required|string|max:255|min:6',
            'description' => 'required|string|max:255|min:8',
            'link' => 'nullable|url|max:255',
            'lampiran' => 'nullable|file|mimes:pdf|max:2048',
        ];
    }
}
