<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Artikel;
use App\Models\Berita;
use App\Models\Event;
use App\Models\FAQ;
use App\Models\File;
use App\Models\Galery;
use App\Models\Kategori;
use App\Models\KategoriPelapor;
use App\Models\Meta;
use App\Models\Pelapor;
use App\Models\Pengumuman;
use App\Notifications\FAQNotification;
use App\Notifications\laporanNotification;

class AuthenticatedSessionController extends Controller
{

    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */


    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function dashboard()
    {
        $kategoriPelapor = KategoriPelapor::count();
        $profil = Meta::count();
        $berita = Berita::count();
        $galery = Galery::count();
        $artikel = Artikel::count();
        $file = File::count();
        $faqs   = FAQ::count();
        $pengumuman = Pengumuman::count();
        $kategori = Kategori::count();
        $event = Event::count();
        $pelapor = Pelapor::count();

        $admin = auth()->user();
        $laporan = Pelapor::get();
        foreach ($laporan as $key) {
            $saveNotification = $admin->notifications()->where('data->id', $key->id)->first();
            if (!$saveNotification) {
                $notifikasi = new laporanNotification($key);
                $admin->notify($notifikasi);
            }
        }

        // $faq = FAQ::get();
        // foreach ($faq as $faqItem) {
        //     $savenotify = $admin->notifications()->where('data->faq_id', $faqItem->id)->first();
        //     if (!$savenotify) {
        //         $notify = new FAQNotification($faqItem);
        //         $admin->notify($notify);
        //     }
        // }
        return view('admin.dashboard', compact('berita', 'laporan', 'galery', 'artikel', 'file', 'kategori', 'pengumuman', 'event', 'faqs', 'pelapor', 'profil', 'kategoriPelapor'));
    }

    public function notification($id)
    {
        if ($id) {
            auth()->user()->notifications()->where('id', $id)->first()->markAsRead();
        }
        return redirect()->back();
    }
}
