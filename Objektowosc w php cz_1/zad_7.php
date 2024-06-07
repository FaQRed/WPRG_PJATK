<?php
class Car
{
    public static $count = 0;
    private $model;
    private $price;
    private $exchangeRate;

    public function __construct($model, $price, $exchangeRate)
    {
        $this->model = $model;
        $this->price = $price;
        $this->exchangeRate = $exchangeRate;
        self::$count++;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getExchangeRate()
    {
        return $this->exchangeRate;
    }

    public function setExchangeRate($exchangeRate)
    {
        $this->exchangeRate = $exchangeRate;
    }

    public function value()
    {
        return $this->price * $this->exchangeRate;
    }

    public function __toString()
    {
        return "Model: {$this->model}, Price: {$this->price} EURO, Exchange Rate: {$this->exchangeRate} PLN";
    }
}

class NewCar extends Car
{
    private $alarm;
    private $radio;
    private $climatronic;

    public function __construct($model, $price, $exchangeRate, $alarm, $radio, $climatronic)
    {
        parent::__construct($model, $price, $exchangeRate);
        $this->alarm = $alarm;
        $this->radio = $radio;
        $this->climatronic = $climatronic;
    }

    public function getAlarm()
    {
        return $this->alarm;
    }

    public function setAlarm($alarm)
    {
        $this->alarm = $alarm;
    }

    public function getRadio()
    {
        return $this->radio;
    }

    public function setRadio($radio)
    {
        $this->radio = $radio;
    }

    public function getClimatronic()
    {
        return $this->climatronic;
    }

    public function setClimatronic($climatronic)
    {
        $this->climatronic = $climatronic;
    }

    public function value()
    {
        $baseValue = parent::value();
        if ($this->alarm) {
            $baseValue *= 1.05;
        }
        if ($this->radio) {
            $baseValue *= 1.075;
        }
        if ($this->climatronic) {
            $baseValue *= 1.10;
        }
        return $baseValue;
    }

    public function __toString()
    {
        $alarmStatus = $this->alarm ? 'Yes' : 'No';
        $radioStatus = $this->radio ? 'Yes' : 'No';
        $climatronicStatus = $this->climatronic ? 'Yes' : 'No';

        return parent::__toString() . ", Alarm: {$alarmStatus}, Radio: {$radioStatus}, Climatronic: {$climatronicStatus}";
    }
}
?>