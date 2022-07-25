<?php

namespace App\Http\Controllers;

use App\Libraries\Calendar;
use App\Models\Event;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(Request $request) {
        $events = Event::all()->toArray();

        $calendar = new Calendar($request);
        $calendar->addEvents($events);
        echo $calendar->render();
    }
}
