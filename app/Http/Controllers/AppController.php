<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\Day;

use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * Application dashboard.
     *
     * @param Request $request
     *
     * @return Illuminate\View\View
     */
    public function dashboard(Request $request) {
        return view('app.dashboard', [
            'days' => Day::where('user_id', $request->user()->id)->orderBy('date', 'desc')->get()
        ]);
    }
}
