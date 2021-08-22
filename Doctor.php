<?php

class Doctor extends Person
{
    private string $speciality;

    function __construct()
    {
        parent::__construct();
        // print "FOR ME: class Doctor initialized \n";
        $this->speciality = "None";

    }

    function inputElement($ind)
    {
        echo "---------- \n";
        echo "Input doctor №" . $ind . "\n";
        parent::inputPerson();
        echo "Speciality: ";
        $this->speciality = readline();
    }

    public function printElement($ind)
    {
        echo $ind . "\t";
        parent::printPerson();
        echo $this->speciality . "\n";
    }
}