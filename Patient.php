<?php

class Patient extends Person
{
    private string $illness;

    function __construct()
    {
        parent::__construct();
        // print "FOR ME: class Patient initialized \n";
        $this->illness = "None";
    }

    function inputElement($ind)
    {
        echo "----------\n";
        echo "Patient №" . $ind . "\n";
        parent::inputPerson();
        echo "Illness: ";
        $this->illness = readline();
    }

    function printElement($ind)
    {
        echo $ind . "\t";
        parent::printPerson();
        echo $this->illness . "\n";
    }

    function setParametersToElement($list)
    {
        parent::setParametersToPerson($list);
        $this->illness = $list[2];
    }

    function writeElementToDataBase($file)
    {
        parent::writePersonToDataBase($file);
        fwrite($file, $this->illness . "\n");
    }
}