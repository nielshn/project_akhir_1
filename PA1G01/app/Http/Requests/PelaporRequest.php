<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PelaporRequest extends FormRequest
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
            'nama_pelapor' => 'required|string|max:255|min:4|regex:/^[a-zA-Z\s]+$/',
            'noTelepon' => 'required|numeric|min:11',
            'judul_laporan' => 'required|string|max:255',
            'email' => 'required|email|regex:/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/|ends_with:.com,.net,.org,.edu,.gov',
            'kategoriPelapor_id' => 'required|exists:kategori_pelapor,id',
            'unit_pelapor' => 'required|string|max:255',
            'body' => 'required|string',
            'bukti_pelapor' => 'nullable|string',
            'lampiran' => 'required|file|mimes:jpeg,png,jpg,pdf,docx|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'nama_pelapor.required' => 'Nama pelapor wajib diisi.',
            'nama_pelapor.string' => 'Nama pelapor harus berupa teks.',
            'nama_pelapor.max' => 'Nama pelapor maksimal :max karakter.',
            'nama_pelapor.min' => 'Nama pelapor minimal :min karakter.',
            'noTelepon.required' => 'Nomor telepon wajib diisi.',
            'noTelepon.numeric' => 'Nomor telepon harus berupa angka.',
            'noTelepon.min' => 'Nomor telepon minimal :min digit.',
            'judul_laporan.required' => 'Judul laporan wajib diisi.',
            'judul_laporan.string' => 'Judul laporan harus berupa teks.',
            'judul_laporan.max' => 'Judul laporan maksimal :max karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'kategoriPelapor_id.required' => 'Kategori pelapor wajib diisi.',
            'kategoriPelapor_id.exists' => 'Kategori pelapor tidak valid.',
            'unit_pelapor.required' => 'Unit pelapor wajib diisi.',
            'unit_pelapor.string' => 'Unit pelapor harus berupa teks.',
            'unit_pelapor.max' => 'Unit pelapor maksimal :max karakter.',
            'body.required' => 'Isi laporan wajib diisi.',
            'body.string' => 'Isi laporan harus berupa teks.',
            'lampiran.required' => 'Lampiran wajib diisi.',
            'lampiran.file' => 'Lampiran harus berupa file.',
            'lampiran.mimes' => 'Format lampiran tidak valid.',
            'lampiran.max' => 'Ukuran lampiran maksimal :max kilobita.',
        ];
    }
}
