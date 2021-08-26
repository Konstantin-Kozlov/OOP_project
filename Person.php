<?php

class Person
{
    protected int $age;
    protected string $name;

    function __construct()
    {
        // print "FOR ME: class Man initialized \n";
        $this->age = 0;
        $this->name = "None";
    }

    function inputPerson()
    {
        echo "Age: ";
        $this->age = getInt("age");
        echo "Name: ";
        $this->name = readline();
    }

    function printPerson()
    {
        echo $this->age . "\t\t";
        echo $this->name . str_repeat(" ", 14-strlen($this->name));
    }

    function setParametersToPerson($list)
    {
       $this->name = $list[0];
       $this->age = $list[1];
    }

    function writePersonToDataBase($file)
    {
        fwrite($file, $this->name . " " . $this->age . " ");
    }
}