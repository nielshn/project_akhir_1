<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengumumanRequest extends FormRequest
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
            'judul_pengumuman' => 'required|string|max:255',
            'deskripsi' => 'required|string|min:10',
            'lampiran' => 'nullable|file|mimes:pdf,docx,xlsx|max:2048',
            'size' => 'nullable|integer|min:0',
            'expired_time' => 'required|date_format:Y-m-d\TH:i',
        ];
    }

}

