<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Goal;
use App\Models\User;

use Illuminate\Http\Request;


class DayController extends Controller
{
    /**
     * Display the "single Day" view.
     *
     * @param Request $request
     * @param Day $day
     *
     * @return \Illuminate\View\View
     */
    public function single(Request $request, Day $day) {
        return view('app.view-day', [
            'day' => $day->load('goals')
        ]);
    }


    /**
     * Display the "create a new Day" view.
     *
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request) {
        return view('app.new-day');
    }


    /**
     * Create a new Day and all given Goals.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request) {
        $request->validate([]);
    }


    /**
     * Update a given Day and its associated Goals.
     *
     * @param Request $request
     * @param Day $day
     *
     * @return Response
     */
    public function update(Request $request, Day $day) {
    }


    /**
     * Delete a given Day and its associated Goals.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function delete(Request $request) {
    }
}
