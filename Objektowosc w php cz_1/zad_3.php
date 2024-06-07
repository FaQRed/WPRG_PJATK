<?php
class Factorial {
    public $n;

    public function __construct($n) {
        if (!is_int($n)) {
            echo "Nie liczba lub brak argumentu";
            return;
        }
        $this->n = $n;
    }

    public function result() {
        if ($this->n < 0) {
            return "Error";
        } elseif ($this->n == 0) {
            return 1;
        } else {
            $factorial = 1;
            for ($i = 1; $i <= $this->n; $i++) {
                $factorial *= $i;
            }
            return $factorial;
        }
    }
}
