<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimelineController extends Controller
{
    public function __invoke(Request $request){
        $statuses = Status::where('user_id', Auth::user()->id)->get();
        return view('timeline', compact('statuses'));
    }
}
