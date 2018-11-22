<?php

class UserModel
{
    private $name;
    private $birthday;
    private $address;

    public function __construct ($name, $birthday, $address)
    {
        $this->name = $name;
        $this->birthday = $birthday;
        $this->address = $address;
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