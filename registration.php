<?php

use App\UserRegistration;

require_once('App/UserRegistration.php');

if ($_POST) {
    $registration = new UserRegistration($_POST);

    echo $registration->registration();
}
