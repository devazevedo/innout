<?php
    error_reporting(E_ALL & ~E_NOTICE);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    require_once(dirname(__FILE__, 2) . '/config/config.php');
    session_start();
    requireValidSession();

    $user = $_SESSION['user'];
    $record = WorkingHours::loadFromUserAndDate($user->id, date('Y-m-d'));

    try {

        
        $currentTime = date('H:i:s');

        if($_POST['forcedTime']) {
            $currentTime = $_POST['forcedTime'];
        }

        $record->innout($currentTime);
        addSuccessMsg('Ponto inserido com sucesso!');
    } catch(AppException $e) {
        addErrorMsg($e->getMessage());
    }
    
    header("Location: http://localhost/innout/src/controllers/day_records.php");