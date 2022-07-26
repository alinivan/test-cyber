<?php

namespace App\Libraries;

use Carbon\Carbon;

class CalendarBuilder
{
    private array $settings;

    public function __construct(string $year, string $month)
    {
        $this->setYear($year);
        $this->setMonth($month);
        $this->init();
    }

    public function init(): void
    {
        $this->setFirstDayOfTheMonthDate();
        $this->setMonthStartDayNumber();
        $this->setDaysInMonth();
        $this->setMonthLabel();
        $this->setDaysLabels();
    }

    private function setYear($year): void
    {
        $this->settings['year'] = $year;
    }

    private function setMonth($month): void
    {
        $this->settings['month'] = $month;
    }

    private function setDaysInMonth(): void
    {
        $this->settings['daysInMonth'] = date('t', strtotime($this->getFirstDayOfTheMonthDate()));
    }

    private function setFirstDayOfTheMonthDate(): void
    {
        $this->settings['firstDayOfTheMonthDate'] = $this->getYear() . '-' . $this->getMonth() . '-01';
    }

    private function setMonthStartDayNumber(): void
    {
        $this->settings['monthStartDayNumber'] = date('N', strtotime($this->getFirstDayOfTheMonthDate()));
    }

    private function setMonthLabel(): void
    {
        $this->settings['monthLabel'] = Carbon::createFromFormat('Y-m-d', $this->getFirstDayOfTheMonthDate())->format('F');
    }

    private function setDaysLabels(): void
    {
        $this->settings['daysLabels'] = ['Mon', 'Tue', 'Wed,', 'Thu', 'Fri', 'Sat', 'Sun'];
    }

    public function getSettings(): array
    {
        return $this->settings;
    }

    public function getYear()
    {
        return $this->settings['year'];
    }

    public function getMonth()
    {
        return $this->settings['month'];
    }

    public function getDaysInMonth()
    {
        return $this->settings['daysInMonth'];
    }

    public function getMonthLabel()
    {
        return $this->settings['monthLabel'];
    }

    public function getFirstDayOfTheMonthDate()
    {
        return $this->settings['firstDayOfTheMonthDate'];

    }
}
