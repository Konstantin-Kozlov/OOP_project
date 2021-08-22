<?php

function printMenu()
{
    echo "MENU:\n";
    echo "1. First input/Addition list of patients\n";
    echo "2. First input/Addition list of doctors\n";
    echo "3. Print BD\n";
    echo "4. Exit\n";
    echo ">";
}

function getMenuItem()
{
    $ans = getInt("menu");
    return $ans;
}

function menu($hos)
{
    do {
        printMenu();
        $item = getMenuItem();
        switch ($item) {
            case 1:
                echo "--------- Input list of patients: ---------\n";
                $hos->inputListPatient();
                break;
            case 2:
                echo "\n--------- Input list of doctors: ----------\n";
                $hos->inputListDoctor();
                break;
            case 3:
                $hos->printDataBase();
                break;
        }
        if ($item != 4) {
            echo "\nClick any guide to continue ...";
            readline();
            echo "\n";
        }
    } while($item != 4);
}
