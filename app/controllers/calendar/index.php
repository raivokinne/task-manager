<?php

namespace App\controllers\calendar;

use App\Models\Task;
use App\Models\User;
use Core\Session;

function getDaysInMonth($month, $year)
{
    return cal_days_in_month(CAL_GREGORIAN, $month, $year);
}

function getFirstDayOfWeek($month, $year)
{
    return date('N', strtotime("$year-$month-01"));
}

function getTasksByMonth($month, $year)
{
    $startOfMonth = date("$year-$month-01");
    $endOfMonth = date('Y-m-t', strtotime($startOfMonth));

    $user = User::where('email', '=', $_SESSION['user']['email'])->get();

    if ($user) {
        return Task::where('deadline', '>=', $startOfMonth)
            ->where('deadline', '<=', $endOfMonth)
            ->where('user_id', '=', $user['id'])
            ->getAll();
    } else {
        $tasks = [];
    }
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

if (Session::has('user')) {
    $tasks = getTasksByMonth($currentMonth, $currentYear);
} else {
    $tasks = [];
}

return view(
    'calendar/index',
    [
        'title' => 'Calendar',
        'currentMonth' => $currentMonth,
        'currentYear' => $currentYear,
        'daysInMonth' => $daysInMonth,
        'firstDayOfWeek' => $firstDayOfWeek,
        'tasks' => $tasks
    ]
);
