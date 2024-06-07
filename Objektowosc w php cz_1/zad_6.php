<?php
class Student {
    private $name;
    private $ID;
    private $secondName;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getID() {
        return $this->ID;
    }

    public function getSecondName() {
        return $this->secondName;
    }

    public static function withID($name, $ID) {
        $obj = new self($name);
        $obj->ID = $ID;
        return $obj;
    }

    public static function withSecondName($name, $secondName) {
        $obj = new self($name);
        $obj->secondName = $secondName;
        return $obj;
    }
}
