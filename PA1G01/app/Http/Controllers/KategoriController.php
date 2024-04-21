<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriRequest;
use App\Models\Kategori;
// use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{

    public function index()
    {
        $kategori = Kategori::latest()->paginate(null);
        // array untuk compact adalah nama table = variable fetch data Model
        return view('admin.kategori.index', compact('kategori'));
    }


    public function create()
    {
        return view('admin.kategori.create', [
            'kategori' => new Kategori,
            'submit' => 'Create',
        ]);
    }

    public function store(KategoriRequest $request)
    {
        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori)
        ]);
        return redirect()->route('kategori.index')->with('success', 'Data berhasil tersimpan');
    }


    public function show($id)
    {
    }


    public function edit(Kategori $kategori)
    {
        return view(
            'admin.kategori.edit',
            [
                'kategori' => $kategori,
                'submit' => 'Update',
            ]
        );
    }


    public function update(KategoriRequest $request, $id)
    {
        // $data = $request->all();
        // $data['slug'] = Str::slug($request->nama_kategori);
        Kategori::find($id)->update([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori)
        ]);
        return redirect()->route('kategori.index')->with('success', 'Data berhasil terupdate');
    }


    public function destroy($id)
    {
        Kategori::find($id)->delete();
        return redirect()->route('kategori.index')->with('success', 'Data berhasil dihapus');
    }
}
