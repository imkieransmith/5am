<?php

namespace App\Http\Livewire\Day;

use Auth;
use Carbon\Carbon;

use App\Models\Day;
use App\Models\Goal;
use App\Models\User;

use Livewire\Component;


class Create extends Component
{
    public $date;
    public $timezone;
    public $type;
    public $wellness;
    public $goals;



    /**
     * Calculate the appropriate date for the new Day.
     * Render this Livewire component.
     *
     * @return Illuminate\View\View
     */
    public function render() {
        // Use the timezone value pulled from JS, but default to UTC.
        // User timezone vs server timezone might be different so localise where possible.

        $day = Day::where('user_id', Auth::id())->latest('date')->first();

        if($day) {
            $latest = $day->date->startOfDay();
            $latest->tz = ($day->timezone ?: 'UTC');
        } else {
            // If we don't have a Day, just use today.
            $latest = Carbon::now(($this->timezone ?: 'UTC'))->startOfDay();
        }

        $now = Carbon::now(($this->timezone ?: 'UTC'))->startOfDay();

        // The latest Day created is either today or some time in the future.
        // This day should be the next available date without a Day.
        if($latest >= $now) {
            $this->date = $latest->addDay();

        // The latest Day is in the past.
        } else {
            // If it's before 5am, add a new Day for today.
            if(Carbon::now()->hour < 5) {
                $this->date = Carbon::now();

            // Otherwise add a new Day for tomorrow.
            } else {
                $this->date = $now->addDay();
            }
        }

        return view('livewire.day.create');
    }


    /**
     * Create a new Day and redirect to view it.
     *
     * @return Illuminate\Http\RedirectResponse
     */
    public function create() {
        //$this->validate();

        $latest = Day::where('user_id', Auth::id())->latest('date')->first();

        if($latest && $latest->status == 'inprogress') {
            $status = 'upcoming';
        } else {
            $status = 'inprogress';
        }

        $day = Day::create([
            'user_id'  => Auth::id(),
            'date'     => $this->date,
            'timezone' => $this->timezone,
            'type'     => $this->type,
            'status'   => $status,
            'wellness' => $this->wellness
        ]);

        if($this->goals) {
            foreach($this->goals as $goal) {
                Goal::create([
                    'day_id'  => $day->id,
                    'aim'     => $goal,
                    'outcome' => '',
                    'status'  => 'in-progress'
                ]);
            }
        }

        return redirect()->to('/day/' . $this->date->format('Y-m-d'));
    }
}
