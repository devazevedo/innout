<?php

    function requireValidSession() {
        $user = $_SESSION['user'];

        if(!isset($user)) {
            header('Location: http://localhost/innout/public/');
            exit();
        }
    }