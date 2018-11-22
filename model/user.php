<?php

class UserModel
{
<<<<<<< HEAD
    private $nisn;
    private $nama;
    private $nilairapor;
    private $nem;
    private $kehadiran;
    private $akreditas;
    private $nilaitingkahlaku;

    public function __construct ($nisn, $nama, $nilairapor, $nem, $kehadiran, $akreditas, $nilaitingkahlaku)
    {
        $this->nisn = $nisn;
        $this->nama = $nama;
        $this->nilairapor = $nilairapor;
        $this->nem = $nem;
        $this->kehadiran = $kehadiran;
        $this->akreditas = $akreditas;
        $this->nilaitingkahlaku = $nilaitingkahlaku;
=======
    private $username;
    private $name;
    private $type;

    public function __construct ($username, $name, $type)
    {
        $this->username = $username;
        $this->name = $name;
        $this->type = $type;
>>>>>>> b8898454f417aafde159b3b30af82ad4aa196629
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
          return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }

        return $this;
    }
}


?>