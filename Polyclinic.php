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

    function printTitlePatients(){
        echo "---- Patients ----\n";
        echo "№:\t";
        echo "Age:\t";
        echo "Name:" . str_repeat(" ", 9);
        echo "Illness:\n";
    }

    function printTitleDoctors(){
        echo "---- Doctors ----\n";
        echo "№:\t";
        echo "Age:\t";
        echo "Name:" . str_repeat(" ", 9);
        echo "Specialty:\n";
    }

    function printDataBase() {
        echo "Data Base:\n";

        if ($this->countPatients != 0)
        {
            $this->printTitlePatients();
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
            $this->printTitleDoctors();
            for ($i = 0; $i < $this->countDoctors; $i++) {
                $this -> listDoctors[$i] -> printElement($i+1);
            }
            echo "Count of doctors: " . $this->countDoctors . "\n";
        } else {
            echo "---- Doctors ----\n";
            echo "Empty list of doctors\n";
        }
    }
}