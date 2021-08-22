<?php

class Factory {
    public function buildPatient()
    {
        return new Patient();
    }

    public function buildDoctor()
    {
        return new Doctor();
    }

    public function buildPolyclinic($patient, $doctor){
        return Polyclinic::getInstance($patient, $doctor);
    }

    public function build()
    {
        $patient = $this->buildPatient();
        $doctor = $this->buildDoctor();
        return $this->buildPolyclinic($patient, $doctor);

    }
}