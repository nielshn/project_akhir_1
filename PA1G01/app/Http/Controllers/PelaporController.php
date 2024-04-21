<?php

namespace App\Http\Controllers;

use App\Http\Requests\PelaporRequest;
use App\Models\KategoriPelapor;
use App\Models\Pelapor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PelaporController extends Controller
{

    public function index()
    {
        $pelapor = Pelapor::latest()->paginate(null);
        return view('admin.laporan.index', compact('pelapor'));
    }


    public function create()
    {
        $pelapor = Pelapor::all();
        $kategori_pelapor = KategoriPelapor::all();
        return view('guest.report', compact('pelapor', 'kategori_pelapor'));
    }



    public function store(PelaporRequest $request)
    {
        $validatedData = $request->validated();

        // Mengelola upload lampiran
        $lampiran = $request->file('lampiran');
        $lampiranName = $lampiran->getClientOriginalName();
        $lampiranPath = $lampiran->move(public_path('uploads/lampiran'), $lampiranName);

        // Menambahkan nama dan path lampiran ke $validatedData
        $validatedData['lampiran'] = $lampiranName;
        $validatedData['lampiran_path'] = $lampiranPath;

        // Proses penyimpanan data ke database
        Pelapor::create($validatedData);

        // Redirect ke halaman laporan dengan pesan sukses
        return redirect()->back()->with('success', 'Laporan berhasil dibuat.');
    }


    public function destroy($id)
    {
        $laporan = Pelapor::find($id);
        if ($laporan) {
            Storage::delete($laporan->lampiran);
            $laporan->delete();
            return redirect()->route('laporan.index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('laporan.index')->with('error', 'Data tidak ditemukan');
        }
    }
}
