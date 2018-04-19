<?php

include "DayIterator.php";

class Month implements IteratorAggregate
{
    public $list;

    public function __construct(int $month, int $year)
    {
        for ($i = 1; $i <= cal_days_in_month(CAL_GREGORIAN, $month, $year); $i++) {
            $this->list[] = new DateTime($year . "-" . $month . "-" . $i);
        }
    }

    public function getIterator()
    {
        return new DayIterator($this->list);
    }

    function getNumberOfWeek($date)
    {
        return date("N", $date->getTimestamp());
    }

}
