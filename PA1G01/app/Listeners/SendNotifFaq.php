<?php

// namespace App\Listeners;

// use App\Models\FAQ;
// use App\Notifications\FaqNotification;
// use Illuminate\Support\Facades\Notification;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Queue\InteractsWithQueue;

// class SendNotifFaq
// {

//     /**
//      * Handle the event.
//      *
//      * @param  object  $event
//      * @return void
//      */
//     public function handle($event)
//     {
//         $admin = FAQ::whereHas('nama', function ($query) {
//             $query->where('id', 1);
//         })->get();
//         Notification::send($admin, new FaqNotification($event->faq));
//     }
// }
