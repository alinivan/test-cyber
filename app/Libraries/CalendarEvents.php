<?php

namespace App\Libraries;

class CalendarEvents
{
    public array $events = [];

    public function __construct(array $events)
    {
        $this->addEvents($events);
    }

    public function addEvents(array $events = []): void
    {
        if (!empty($events)) {
            $this->events += $events;
        }
    }

    public function getEvents(): array
    {
        return $this->events;
    }
}
