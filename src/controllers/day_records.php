<?php

    require_once(dirname(__FILE__, 2) . '/config/config.php');
    session_start();
    requireValidSession();

    $date = (new Datetime())->getTimestamp();
    $today = strftime('%d de %B de %Y', $date);

    loadTemplateView('day_records', ['today' => $today]);