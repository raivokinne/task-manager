<?php

function getDaysInMonth($month, $year)
{
    return cal_days_in_month(CAL_GREGORIAN, $month, $year);
}

function getFirstDayOfWeek($month, $year)
{
    return date('N', strtotime("$year-$month-01"));
}

$currentMonth = $_GET['month'] ?? date('m');
$currentYear = $_GET['year'] ?? date('Y');

if ($currentMonth < 1 || $currentMonth > 12) {
    $currentMonth = date('m');
}

if ($currentYear < 1970) {
    $currentYear = date('Y');
}

$daysInMonth = getDaysInMonth($currentMonth, $currentYear);
$firstDayOfWeek = getFirstDayOfWeek($currentMonth, $currentYear);

return view('calendar/index', [
    'title' => 'Calendar',
    'currentMonth' => $currentMonth,
    'currentYear' => $currentYear,
    'daysInMonth' => $daysInMonth,
    'firstDayOfWeek' => $firstDayOfWeek
]);

