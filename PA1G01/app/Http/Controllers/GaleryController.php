<?php

namespace App\Http\Controllers;

use App\Http\Requests\GaleryRequest;
use Illuminate\Http\Request;
use App\Models\Galery;
use App\Models\Multipic;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

// use Illuminate\Http\Request;

class GaleryController extends Controller
{
    public function index()
    {
        $galery = Galery::latest()->paginate(null);
        return view('admin.galery.index', compact('galery'));
    }
    

    public function create()
    {
        $galery = Galery::all();
        return view('admin.galery.create', compact('galery'));
    }

    public function store(GaleryRequest $request)
    {
        // dd($request->all());
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['nama']);
        $galery = Galery::create($validated);

        if ($request->has('image')) {
            foreach ($request->file('image') as $image) {
                $imageName = $validated['nama'] . '-image-' . time() . rand(1, 1000) . '.' . $image->getClientOriginalExtension();
                $resizedImage = Image::make($image)->fit(800, 600)->encode();
                $resizedImage->save(public_path('uploads/galeri/') . $imageName);

                Multipic::create([
                    'galery_id' => $galery->id,
                    'image' => $imageName
                ]);
            }
        }
        return redirect()->route('galery.index')->with('success', 'Gambar berhasil diunggah');
    }

    public function show($id)
    {
    }

    public function edit(Galery $galery)
    {
        return view('admin.galery.edit', compact('galery'));
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'min:6', 'regex:/^[a-zA-Z\s]+$/'],
            'description' => ['required', 'string'],
            'images' => 'array',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $galery = Galery::find($id);
        $galery->update([
            'nama' => $validated['nama'],
            'description' => $validated['description'],
            'slug' => Str::slug($validated['nama']),
        ]);

        if ($request->hasFile('image')) {
            // Menghapus gambar-gambar sebelumnya terkait galeri
            $galery->images()->delete();

            foreach ($request->file('image') as $image) {
                $imageName = $validated['nama'] . '-image-' . time() . rand(1, 1000) . '.' . $image->getClientOriginalExtension();
                $resizedImage = Image::make($image)->fit(800, 600)->encode();
                // Simpan gambar yang sudah diresize
                $resizedImage->save(public_path('uploads/galeri/') . $imageName);
                $galery->images()->create([
                    'image' => $imageName
                ]);
            }
        }

        return redirect()->route('galery.index')->with('success', 'Gambar berhasil diperbarui');
    }


    public function destroy($id)
    {
        $galery = Galery::findOrFail($id);
        // Menghapus gambar-gambar terkait galeri
        foreach ($galery->images as $image) {
            Storage::delete('uploads/galeri/' . $image->image);
        }
        $galery->images()->delete();
        $galery->delete();
        return redirect()->route('galery.index')->with('success', 'Gambar berhasil dihapus');
    }
}
