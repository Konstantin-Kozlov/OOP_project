<?php

spl_autoload_register(function ($className)
{
    include $className . '.php';
});

require('functions_for_menu.php');
require('add_functions.php');

/*
 * До паттернов:
 * $patient = new Patient();
 * $doctor = new Doctor();
 * $hos = new Polyclinic($patient, $doctor)
 *
 * Singletone:
 * $patient = new Patient();
 * $doctor = new Doctor();
 * $hos = Polyclinic::getInstance($patient, $doctor);
 *
 * Singletone + Factory:
 * $factory = new Factory();
 * $hos = $factory->build();
 */

$factory = new Factory();
$hos = $factory->build();
menu($hos);
