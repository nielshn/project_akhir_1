<?php

namespace App\Http\Controllers;

use App\Http\Requests\BeritaRequest;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{

    public function index()
    {
        $berita = Berita::latest()->paginate(null);
        return view('admin.berita.index', compact('berita'));
    }


    public function create()
    {
        $kategori = Kategori::all();
        $berita = Berita::all();
        return view('admin.berita.create', compact('kategori', 'berita'));
    }


    public function store(BeritaRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->judulBerita);
        $data['user_id'] = Auth::id();
        $data['views'] = 0;
        if ($request->hasFile('gambar_berita')) {
            $file = $request->file('gambar_berita');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('uploads/berita'), $filename);
            $data['gambar_berita'] = $filename;
        } else {
            $data['gambar_berita'] = 'null';
        }
        Berita::create($data);
        return redirect()->route('berita.index')->with('success', 'Berita berhasil di Create');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $berita = Berita::find($id);
        $kategori = Kategori::all();
        if (!$berita) {
            abort(404); //tampilkan error 404
        }
        return view('admin.berita.edit', compact('berita', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judulBerita' => 'required|min:4|string',
            'body' => 'required|min:8|string',
            'kategori_id' => 'required',
            'gambar_berita' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
        $berita = Berita::find($id);
        if (empty($request->file('gambar_berita'))) {
            $berita->update([
                'judulBerita' => $request->judulBerita,
                'body' => $request->body,
                'kategori_id' => $request->kategori_id,
                'is_active' => $request->is_active,
                'slug' => Str::slug($request->judulBerita),
                'user_id' => Auth::id(),
                'views' => 0,
            ]);
        } else {
            $gambar_berita = $request->file('gambar_berita');
            $filename = time() . '-' . $gambar_berita->getClientOriginalName();
            $gambar_berita->move(public_path('uploads/berita'), $filename);
            Storage::delete($berita->gambar_berita);
            $berita->update([
                'judulBerita' => $request->judulBerita,
                'body' => $request->body,
                'kategori_id' => $request->kategori_id,
                'is_active' => $request->is_active,
                'slug' => Str::slug($request->judulBerita, '-'),
                'user_id' => Auth::id(),
                'gambar_berita' => $filename,
                'views' => 0,
            ]);
        }
        return redirect()->route('berita.index')->with('success', 'Berita berhasil diupdate');
    }


    public function destroy($id)
    {
        Storage::delete(Berita::find($id)->gambar_berita);
        Berita::find($id)->delete();
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus');
    }
}
