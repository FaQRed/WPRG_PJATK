<?php
class Car {
    private $model;
    private $price;
    private $quantity;

    public function __construct($model, $price, $quantity) {
        $this->model = $model;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getModel() {
        return $this->model;
    }

    public function setModel($model) {
        $this->model = $model;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function __toString() {
        return "Car: Model: $this->model, Price: $this->price, Quantity: $this->quantity";
    }
}

class NewCar extends Car {
    private $alarm;
    private $radio;
    private $climatronic;

    public function __construct($model, $price, $quantity, $alarm, $radio, $climatronic) {
        parent::__construct($model, $price, $quantity);
        $this->alarm = $alarm;
        $this->radio = $radio;
        $this->climatronic = $climatronic;
    }

    public function getAlarm() {
        return $this->alarm;
    }

    public function setAlarm($alarm) {
        $this->alarm = $alarm;
    }

    public function getRadio() {
        return $this->radio;
    }

    public function setRadio($radio) {
        $this->radio = $radio;
    }

    public function getClimatronic() {
        return $this->climatronic;
    }

    public function setClimatronic($climatronic) {
        $this->climatronic = $climatronic;
    }

    public function __toString() {
        return parent::__toString() . ", Alarm: " . ($this->alarm ? "Yes" : "No") . ", Radio: " . ($this->radio ? "Yes" : "No") . ", Climatronic: " . ($this->climatronic ? "Yes" : "No");
    }
}

class InsuranceCar extends NewCar {
    private $firstOwner;
    private $years;

    public function __construct($model, $price, $quantity, $alarm, $radio, $climatronic, $firstOwner, $years) {
        parent::__construct($model, $price, $quantity, $alarm, $radio, $climatronic);
        $this->firstOwner = $firstOwner;
        $this->years = $years;
    }

    public function getFirstOwner() {
        return $this->firstOwner;
    }

    public function setFirstOwner($firstOwner) {
        $this->firstOwner = $firstOwner;
    }

    public function getYears() {
        return $this->years;
    }

    public function setYears($years) {
        $this->years = $years;
    }

    public function value() {
        $value = parent::getPrice() * parent::getQuantity();
        if ($this->firstOwner) {
            $value -= 0.05 * $value;
        }
        $value -= 0.01 * $value * $this->years;
        return $value;
    }

    public function __toString() {
        return parent::__toString() . ", First Owner: " . ($this->firstOwner ? "Yes" : "No") . ", Years: " . $this->years;
    }
}
?>
