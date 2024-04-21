<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriRequest;
use App\Models\KategoriPelapor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriPelaporController extends Controller
{
    public function index()
    {
        $kategoriPelapor = KategoriPelapor::latest()->paginate(null);
        return view('admin.kategoriPelapor.index', compact('kategoriPelapor'));
    }

    public function create()
    {
        return view('admin.kategoriPelapor.create', [
            'kategori' => new KategoriPelapor,
            'submit' => 'Create',
        ]);
    }

    public function store(KategoriRequest $request)
    {
        KategoriPelapor::create([
            'nama_kategori' => $request->nama_kategori,
            'slug_kategori' => Str::slug($request->nama_kategori),
        ]);
        return redirect()->route('kategoriPelapor.index')->with('success', 'Kategori Pelapor berhasil tersimpan');
    }

    public function show($id)
    {
    }

    public function edit(KategoriPelapor $kategoriPelapor)
    {
        return view('admin.kategoriPelapor.edit', [
            'kategoriPelapor' => $kategoriPelapor,
            'kategori' => new KategoriPelapor,
            'submit' => 'Update',
        ]);
    }

    public function update(KategoriRequest $request, $id)
    {
        KategoriPelapor::find($id)->update([
            'nama_kategori' => $request->nama_kategori,
            'slug_kategori' => Str::slug($request->nama_kategori),
        ]);
        return redirect()->route('kategoriPelapor.index')->with('success', 'Kategori Pelapor berhasil diupdate');
    }


    public function destroy($id)
    {
        KategoriPelapor::find($id)->delete();
        return redirect()->route('kategoriPelapor.index')->with('success', 'Kategori Pelapor berhasil dihapus');
    }
}
