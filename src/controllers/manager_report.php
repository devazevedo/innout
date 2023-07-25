<?php

    require_once(dirname(__FILE__, 2) . '/config/config.php');
    session_start();
    requireValidSession();

    $activeUsersCount = User::getActiveUsersCount();
    $absentUsers = WorkingHours::getAbsentUsers();
    $yearAndMonth = (new DateTime())->format('Y-m');
    $seconds = WorkingHours::getWorkedTimeInMonth($yearAndMonth);
    $hoursInMonth = explode(':', getTimeStringFromSeconds($seconds))[0];

    loadTemplateView('manager_report', ['activeUsersCount' => $activeUsersCount, 'absentUsers' => $absentUsers, 'hoursInMonth' => $hoursInMonth]);