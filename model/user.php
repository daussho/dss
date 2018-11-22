<?php

class UserModel
{
    private $username;
    private $name;
    private $type;

    public function __construct ($username, $name, $type)
    {
        $this->username = $username;
        $this->name = $name;
        $this->type = $type;
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