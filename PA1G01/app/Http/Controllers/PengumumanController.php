<?php

namespace App\Http\Controllers;

use App\Http\Requests\PengumumanRequest;
use App\Models\Pengumuman;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{

    public function index()
    {
        $pengumuman = Pengumuman::latest()->paginate(null);
        return view('admin.pengumuman.index', compact('pengumuman'));
    }


    public function create()
    {
        $user = User::all();
        return view('admin.pengumuman.create', compact('user'));
    }

    public function store(PengumumanRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('lampiran')) {
            $lampiran = $request->file('lampiran');
            $lampiranName = $lampiran->getClientOriginalName();
            $lampiranPath = $lampiran->move(public_path('uploads/pengumuman'), $lampiranName);
            $lampiranSize = filesize($lampiranPath);

            $validated['lampiran'] = $lampiranName;
            $validated['lampiranPath'] = $lampiranPath;
            $validated['size'] = $lampiranSize;
        }
        $validated['slug'] = Str::slug($request->judul_pengumuman);
        $validated['user_id'] = Auth::id();

        Pengumuman::create($validated);
        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil dibuat');
    }


    public function show($id)
    {
        //
    }

    public function edit(Pengumuman $pengumuman)
    {
        return view('admin.pengumuman.edit', compact('pengumuman'));
    }


    public function update(PengumumanRequest $request, $id)
    {
        $pengumuman = Pengumuman::find($id);
        if (empty($request->file('lampiran'))) {
            $pengumuman->update([
                'judul_pengumuman' => $request->judul_pengumuman,
                'deskripsi' => $request->deskripsi,
                'size' => $pengumuman->size, // Tetapkan nilai size yang sama
                'created_at' => Carbon::now(),
                'slug' => Str::slug($request->judul_pengumuman),
                'expired_time' => $request->expired_time,
                'user_id' => Auth::id(),
            ]);
        } else {
            Storage::delete($pengumuman->lampiran);
            $lampiran = $request->file('lampiran');
            $lampiranName = $lampiran->getClientOriginalName();
            $lampiranPath = $lampiran->move(public_path('uploads/pengumuman'), $lampiranName);
            $size = filesize($lampiranPath); // Dapatkan ukuran file yang baru diunggah
            $pengumuman->update([
                'judul_pengumuman' => $request->judul_pengumuman,
                'deskripsi' => $request->deskripsi,
                'size' => $size, // Simpan ukuran file yang baru diunggah
                'lampiran' => $lampiranName,
                'lampiran_path' => $lampiranPath,
                'created_at' => Carbon::now(),
                'slug' => Str::slug($request->judul_pengumuman),
                'expired_time' => $request->expired_time,
                'user_id' => Auth::id(),
            ]);
        }

        $pengumuman->touch();
        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil diupdate');
    }


    public function destroy($id)
    {
        $pengumuman = Pengumuman::find($id);
        if ($pengumuman) {
            Storage::delete($pengumuman->lampiran);
            $pengumuman->delete();
            return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil dihapus');
        } else {
            return redirect()->route('pengumuman.index')->with('error', 'Pengumuman tidak ditemukan');
        }
    }
}
