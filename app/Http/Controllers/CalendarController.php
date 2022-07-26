<?php

namespace App\Http\Controllers;

use App\Libraries\Calendar;
use App\Libraries\CalendarEvents;
use App\Models\Event;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(Request $request): void
    {
        $year = $request->has('year') ? $request->get('year') : date('Y');
        $month = $request->has('month') ? sprintf('%02d', $request->get('month')) : date('m');

        $events = Event::all()->groupBy('date')->toArray();

        $calendar = new Calendar($year, $month, $events);

        echo $calendar->render();
    }
}
