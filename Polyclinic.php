<?php

class Polyclinic
{
    /**
     * @var int
     * @var Patient[]
     * @var int
     * @var Doctor[]
     */

    private $countPatients;
    private $listPatients = [];
    private $countDoctors;
    private $listDoctors = [];


    private function __construct(Patient $newPatient, Doctor $newDoctor)
    {
        $this->countPatients = 0;
        $this->listPatients[] = $newPatient;
        $this->countDoctors = 0;
        $this->listDoctors[] = $newDoctor;
    }

    // Pattern Singletone
    private static $instance = null;
    public static function getInstance(Patient $newPatient, Doctor $newDoctor)
    {
        if (is_null(self::$instance))
            self::$instance = new self($newPatient, $newDoctor);

        return self::$instance;
    }

    function inputListPatient() {
        echo "Count of patients: ";
        if (count($this->listPatients) == 0) {
            $this->countPatients = getInt("listCount");
            $left = 0;
        } else {
            $new_count_Patients = getInt("listCount");
            $left = $this->countPatients;
            $this->countPatients += $new_count_Patients;
        }
        for ($i = $left; $i < $this->countPatients; $i++) {
            $patient = new Patient();
            $patient -> inputElement($i+1);
            $this->listPatients[$i] = $patient;
        }
    }

    function inputListDoctor() {
        echo "Count of doctors: ";
        if (count($this->listDoctors) == 0) {
            $this->countDoctors = getInt("listCount");
            $left = 0;
        } else {
            $new_count_Doctors = getInt("listCount");
            $left = $this->countDoctors;
            $this->countDoctors += $new_count_Doctors;
        }
        for ($i = $left; $i < $this->countDoctors; $i++) {
            $doctor = new Doctor();
            $doctor -> inputElement($i+1);
            $this->listDoctors[$i] = $doctor;
        }
    }

    function printDataBase() {
        echo "Data Base:\n";

        if ($this->countPatients != 0)
        {
            printTitlePatients();
            for ($i = 0; $i < $this->countPatients; $i++) {
                $this -> listPatients[$i] -> printElement($i+1);
            }
            echo "Count of patients: " . $this->countPatients . "\n";
        } else {
            echo "---- Patients ----\n";
            echo "Empty list of patients\n";
        }

        if ($this->countDoctors != 0)
        {
            printTitleDoctors();
            for ($i = 0; $i < $this->countDoctors; $i++) {
                $this -> listDoctors[$i] -> printElement($i+1);
            }
            echo "Count of doctors: " . $this->countDoctors . "\n";
        } else {
            echo "---- Doctors ----\n";
            echo "Empty list of doctors\n";
        }
    }

    function readFromDataBase(){
        $array1 = file("dbPatients.txt", FILE_IGNORE_NEW_LINES);
        $this->countPatients = count($array1);
        for ($i = 0; $i < $this->countPatients; $i++) {
            $this->listPatients[$i] = new Patient();
            $list = explode(" ", $array1[$i]);
            $this->listPatients[$i]->setParametersToElement($list);
        }

        $array2 = file("dbDoctors.txt", FILE_IGNORE_NEW_LINES);
        $this->countDoctors = count($array2);
        for ($i = 0; $i < $this->countDoctors; $i++) {
            $this->listDoctors[$i] = new Doctor();
            $list = explode(" ", $array2[$i]);
            $this->listDoctors[$i]->setParametersToElement($list);
        }
    }

    function writeToDataBase(){
        $fileDBPatients = fopen("dbPatients.txt", "a");
        ftruncate($fileDBPatients, 0); // clear file
        for ($i = 0; $i < $this->countPatients; $i++)
            $this->listPatients[$i]->writeElementToDataBase($fileDBPatients);
        fclose($fileDBPatients);

        $fileDBDoctors = fopen("dbDoctors.txt", "a");
        ftruncate($fileDBDoctors, 0); // clear file
        for ($i = 0; $i < $this->countDoctors; $i++)
            $this->listDoctors[$i]->writeElementToDataBase($fileDBDoctors);
        fclose($fileDBDoctors);
    }
}