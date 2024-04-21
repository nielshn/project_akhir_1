<?php

namespace App\Listeners;

use App\Models\Pelapor;
use App\Notifications\laporanNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class notifikasiToAdmin
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $admin = Pelapor::whereHas('nama_pelapor', function ($query) {
            $query->where('id', 1);
        })->get();
        Notification::send($admin, new laporanNotification($event->laporan));
    }
}
