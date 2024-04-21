<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Berita;
use App\Models\Event;
use App\Models\FAQ;
use App\Models\File;
use App\Models\Galery;
use App\Models\Kategori;
use App\Models\Meta;
use App\Models\Pengumuman;
use App\Models\User;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $kategori = Kategori::latest()->get();
        $artikel = Artikel::latest()->paginate(3);
        $berita = Berita::latest()->paginate(7);
        $event = Event::latest()->paginate(3);
        $user = User::latest()->get();
        return view('guest.index', compact('kategori', 'artikel', 'berita', 'event', 'user'));
    }
    public function kategori($id)
    {
        $kategori = Kategori::latest()->get();
        $artikel = Artikel::where('kategori_id', $id)->latest()->paginate(5);
        $event = Event::where('kategori_id', $id)->latest()->paginate(5);
        $berita = Berita::where('kategori_id', $id)->latest()->paginate(10);
        $user = User::all();
        return view('guest.kategori', compact('berita', 'artikel', 'user', 'event', 'kategori'));
    }


    public function foto()
    {
        $galery = Galery::latest()->paginate(10);
        return view('guest.galery', compact('galery'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $galeri = Galery::where('nama', 'like', '%' . $searchTerm . '%')->get();

        return $galeri;
    }

    public function file()
    {
        $file = File::latest()->paginate(7);
        return view('guest.file', compact('file'));
    }

    public function announcement()
    {
        $pengumuman = Pengumuman::latest()->paginate(null);
        $user = User::all();
        return view('guest.pengumuman', compact('pengumuman', 'user'));
    }

    public function showAnnounce($id)
    {
        $user = User::all();
        $pengumuman = Pengumuman::findOrFail($id);
        return view('guest.detailPengumuman', compact('user', 'pengumuman'));
    }

    public function question() {
        $user = User::all();
        $event = Event::latest()->paginate(10);
        $faq = FAQ::latest()->get();
        return view('guest.faq', compact('user', 'faq', 'event'));
    }

    public function showArtikel($id)
    {
        $artikel = Artikel::findOrFail($id);
        $user = User::all();
        $event = Event::latest()->paginate(10);
        return view('guest.detailArtikel', compact('artikel', 'user', 'event'));
    }
    public function showBerita($id)
    {
        $berita = Berita::findOrFail($id);
        $user = User::all();
        $event = Event::latest()->paginate(10);
        return view('guest.detailBerita', compact('event', 'user', 'berita'));
    }
    public function showEvent($id)
    {
        $event = Event::findOrFail($id);
        $user = User::all();
        $berita = Berita::latest()->paginate(10);
        return view('guest.detailEvent', compact('event', 'user', 'berita'));
    }

    public function showFoto($id)
    {
        $galeri  = Galery::findOrFail($id);
        $user = User::all();
        $event = Event::latest()->paginate(10);
        return view('guest.detailfoto', compact('galeri', 'event', 'user'));
    }

    public function allnews()
    {
        $kategori = Kategori::latest()->get();
        $berita = Berita::latest()->paginate(20);
        return view('guest.viewAllBerita', compact('kategori', 'berita'));
    }
    public function allArtikel()
    {
        $user = User::all();
        $kategori = Kategori::latest()->get();
        $artikel = Artikel::latest()->paginate(21);
        return view('guest.viewAllArtikel', compact('kategori', 'artikel', 'user'));
    }

    public function allEvent()
    {
        $user = User::all();
        $kategori = Kategori::latest()->get();
        $event = Event::latest()->paginate(21);
        return view('guest.viewAllEvent', compact('kategori', 'event', 'user'));
    }

    // Function for Profile Menu
    public function showStruktur()
    {
        // Mengambil data menu dengan meta_key yang unik untuk struktur organisasi
        $menu = Meta::where('meta_key', 'struktur-organisasi')->first();
        $event = Event::latest()->paginate(10);
        if ($menu) {
            return view('guest.strukturOrganisasi', compact('menu', 'event'));
        }
        return abort(404);
    }

    public function showSejarah()
    {
        // Mengambil data menu dengan meta_key yang unik untuk struktur organisasi
        $menu = Meta::where('meta_key', 'sejarah')->first();
        $event = Event::latest()->paginate(10);

        if ($menu) {
            return view('guest.sejarah', compact('menu', 'event'));
        }
        return abort(404);
    }
    public function showVisiMisi()
    {
        // Mengambil data menu dengan meta_key yang unik untuk struktur organisasi
        $menu = Meta::where('meta_key', 'visi-misi')->first();
        $event = Event::latest()->paginate(10);

        if ($menu) {
            return view('guest.visiMisi', compact('menu', 'event'));
        }
        return abort(404);
    }
    public function showTugasFungsi()
    {
        // Mengambil data menu dengan meta_key yang unik untuk struktur organisasi
        $menu = Meta::where('meta_key', 'tugas-dan-fungsi')->first();
        $event = Event::latest()->paginate(10);

        if ($menu) {
            return view('guest.tugasfungsi', compact('menu', 'event'));
        }
        return abort(404);
    }
    public function showPersonil()
    {
        // Mengambil data menu dengan meta_key yang unik untuk struktur organisasi
        $menu = Meta::where('meta_key', 'personil')->first();
        $event = Event::latest()->paginate(10);

        if ($menu) {
            return view('guest.personil', compact('menu', 'event'));
        }
        return abort(404);
    }
    public function showTanggungJawab()
    {
        // Mengambil data menu dengan meta_key yang unik untuk struktur organisasi
        $menu = Meta::where('meta_key', 'tanggung-jawab')->first();
        $event = Event::latest()->paginate(10);

        if ($menu) {
            return view('guest.tanggungjawab', compact('menu', 'event'));
        }
        return abort(404);
    }
    public function showRuangLingkup()
    {
        // Mengambil data menu dengan meta_key yang unik untuk struktur organisasi
        $menu = Meta::where('meta_key', 'ruang-lingkup')->first();
        $event = Event::latest()->paginate(10);

        if ($menu) {
            return view('guest.ruanglingkup', compact('menu', 'event'));
        }
        return abort(404);
    }
}
