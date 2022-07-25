<?php

namespace App\Libraries;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class Calendar
{
    private string $currentYear;
    private string $currentMonth;
    private array $daysLabel = ['Mon', 'Tue', 'Wed,', 'Thu', 'Fri', 'Sat', 'Sun'];
    private string $monthEndingDay;
    private string $monthStartDay;
    private array $events = [];

    public function __construct(Request $request)
    {
        if ($request->has('year') && $request->has('month')) {
            $this->currentYear = $request->get('year');
            $this->currentMonth = sprintf('%02d', $request->get('month'));
        } else {
            $this->currentYear = date('Y');
            $this->currentMonth = date('m');
        }
    }

    public function test()
    {
        dd($this);
    }

    private function daysInMonth(): string
    {
        return date('t', strtotime($this->currentYear . '-' . $this->currentMonth . '-01'));
    }

    private function weeksInMonth(): int
    {
        $daysInMonth = $this->daysInMonth();
        $numOfWeeks = ($daysInMonth % 7 == 0 ? 0 : 1) + intval($daysInMonth / 7);

        $this->monthEndingDay = date('N', strtotime($this->currentYear . '-' . $this->currentMonth . '-' . $daysInMonth));
        $this->monthStartDay = date('N', strtotime($this->currentYear . '-' . $this->currentMonth . '-01'));

        if ($this->monthEndingDay < $this->monthStartDay) {
            $numOfWeeks++;
        }

        return $numOfWeeks;
    }

    public function addEvents(array $events = []): void
    {
        if (!empty($events)) {
            $this->events += $events;
        }
    }

    public function render(): Factory|View|Application
    {
        $daysInMonth = $this->daysInMonth();
        $weeksInMonth = $this->weeksInMonth();

        if (!empty($this->events)) {
            foreach ($this->events as $k => $event) {
                $this->events[$event['date']][] = $event;
                unset($this->events[$k]);
            }
        }

        return view('pages.calendar', [
            'year' => $this->currentYear,
            'month' => $this->currentMonth,
            'monthLabel' => Carbon::createFromFormat('Y-m-d', $this->currentYear . '-' . $this->currentMonth . '-01')->format('F'),
            'numberOfDays' => $daysInMonth,
            'numberOfWeeks' => $weeksInMonth,
            'monthStartDay' => $this->monthStartDay,
            'monthEndingDay' => $this->monthEndingDay,
            'daysLabels' => $this->daysLabel,
            'events' => $this->events
        ]);
    }
}
