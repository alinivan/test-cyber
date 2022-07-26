<?php

namespace App\Libraries;

use Illuminate\Contracts\View\View;

class CalendarRenderer
{
    public static function render(CalendarBuilder $calendarBuilder, CalendarEvents $calendarEvents): View
    {
        $data = $calendarBuilder->getSettings();
        $data['events'] = $calendarEvents->getEvents();
        return view('pages.calendar', $data);
    }
}
