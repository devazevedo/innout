<?php

    require_once(dirname(__FILE__, 2) . '/config/config.php');

    echo User::getCount(['id' => 3]);