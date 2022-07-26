<?php

namespace App\Libraries;

use Illuminate\Contracts\View\View;

class Calendar
{
    private CalendarEvents $calendarEvents;
    private CalendarBuilder $calendarBuilder;

    public function __construct(string $year, string $month, array $events)
    {
        $this->calendarBuilder = new CalendarBuilder($year, $month);
        $this->calendarEvents = new CalendarEvents($events);
    }

    public function render(): View
    {
        return CalendarRenderer::render($this->calendarBuilder, $this->calendarEvents);
    }
}
