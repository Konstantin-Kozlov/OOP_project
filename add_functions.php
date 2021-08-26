<?php

function getInt($spec)
{
    $ans = -1;
    $flag = false;
    while ($flag == false) {
        $item = readline();
        if (ctype_digit($item)) {
            if ($spec == "menu")
                if ($item >= 1 && $item <= 4)
                    $ans = $item;
            if ($spec == "age" or $spec == "listCount")
                if ($item >= 1)
                    $ans = $item;
        }
        if ($ans != -1) {
            $flag = true;
            break;
        }
        else {
            echo "Incorrect input.Try again \n";
            echo ">";
        }
    }
    return $ans;
}

function systemPause()
{
    echo "\nClick any guide to continue ...";
    readline();
    echo "\n";
}

function printTitlePatients()
{
    echo "---- Patients ----\n";
    echo "№:\t";
    echo "Age:\t";
    echo "Name:" . str_repeat(" ", 9);
    echo "Illness:\n";
}

function printTitleDoctors()
{
    echo "---- Doctors ----\n";
    echo "№:\t";
    echo "Age:\t";
    echo "Name:" . str_repeat(" ", 9);
    echo "Specialty:\n";
}
