<?php

namespace App\Http\Controllers;

use App\Http\Requests\MetaRequest;
use App\Models\Meta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MetaController extends Controller
{

    public function index()
    {
        $meta = Meta::latest()->paginate(null);
        return view('admin.meta.index', compact('meta'));
    }


    public function create()
    {
        $meta = Meta::all();
        return view('admin.meta.create', compact('meta'));
    }


    public function store(MetaRequest $request)
    {
        $validatedData = $request->validated();
        try {
            $validatedData['meta_key'] = Str::slug($request->meta_key);
            Meta::create($validatedData);
            return redirect()->route('meta.index')->with('success', 'Meta Profil berhasil dibuat');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['meta_key' => 'Meta Key sudah digunakan.']);
        }
    }

    public function edit($id)
    {
        $meta = Meta::findOrFail($id);
        return view('admin.meta.edit', compact('meta'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'meta_title' => 'required|max:255',
            'meta_description' => 'required|string',
        ]);
        $meta = Meta::where('id', $id)->first();
        $meta->meta_title =  $validated['meta_title'];
        $meta->meta_description =  $validated['meta_description'];
        $meta->save();

        return redirect()->route('meta.index')->with('success', 'Meta profil berhasil diupdate');
    }


    public function destroy($id)
    {
        Meta::findOrFail($id)->delete();
        return redirect()->route('meta.index')->with('success', 'Meta profil berhasil dihapus');
    }
}
