<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Models\File;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    public function index()
    {
        $file = File::latest()->paginate(null);
        return view('admin.file.index', compact('file'));
    }


    public function create()
    {
        $file = File::all();
        return view('admin.file.create', compact('file'));
    }


    public function store(FileRequest $request)
    {
        $attributes = $request->validated();
        // mengelola upload lampiran
        $lampiran = $request->file('lampiran');
        $lampiranName = $lampiran->getClientOriginalName();
        $lampiranPath = $lampiran->move(public_path('uploads/file'), $lampiranName);

        // Menambahkan nama dan path file ke $attributes
        $attributes['lampiran'] = $lampiranName;
        $attributes['lampiran_path'] = $lampiranPath;

        File::create($attributes);
        return redirect()->route('file.index')->with('success', 'file berhasil dibuat');
    }


    public function show($id)
    {
        //
    }

    public function edit(File $file)
    {
        return view('admin.file.edit', compact('file'));
    }


    public function update(FileRequest $request, $id)
    {
        $file = File::find($id);
        if (empty($request->file('lampiran'))) {
            $file->update([
                'namaFile' => $request->namaFile,
                'description' => $request->description,
                'link' => $request->link,
                'created_at' => Carbon::now(),
            ]);
        } else {
            Storage::delete($file->lampiran);
            $lampiran = $request->file('lampiran');
            $lampiranName = $lampiran->getClientOriginalName();
            $lampiranPath = $lampiran->move(public_path('uploads/file'), $lampiranName);
            $file->update([
                'namaFile' => $request->namaFile,
                'description' => $request->description,
                'link' => $request->link,
                'lampiran' => $lampiranName,
                'lampiranPath' => $lampiranPath,
                'created_at' => Carbon::now(),
            ]);
        }
        $file->touch();
        return redirect()->route('file.index')->with('success', 'File berhasil diupdated');
    }


    public function destroy($id)
    {
        $file = File::find($id);
        if ($file) {
            Storage::delete($file->lampiran);
            $file->delete();
            return redirect()->route('file.index')->with('success', 'file berhasil di hapus');
        } else {
            return redirect()->route('file.index')->with('error', 'file tidak ditemukan');
        }
    }
}
