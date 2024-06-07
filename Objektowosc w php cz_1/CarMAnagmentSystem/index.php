<?php

class Car {
    public $make;
    public $model;
    public $year;

    public function __construct($make, $model, $year) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    public function calculatePrice() {
        return 10000; // Przykładowa cena
    }
}

class NewCar extends Car {
    public function calculatePrice() {
        return 20000; // Przykładowa cena
    }
}

class InsuranceCar extends Car {
    public function calculatePrice() {
        return 15000; // Przykładowa cena
    }
}

session_start();

$cars = [];

// Obsługa formularza dodawania samochodu
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addCar'])) {
    $carType = $_POST['carType'];
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];

    switch ($carType) {
        case 'Car':
            $car = new Car($make, $model, $year);
            break;
        case 'NewCar':
            $car = new NewCar($make, $model, $year);
            break;
        case 'InsuranceCar':
            $car = new InsuranceCar($make, $model, $year);
            break;
        default:
            $car = new Car($make, $model, $year);
            break;
    }

    $cars[] = $car;
    $_SESSION['cars'] = $cars;
}

// Usuwanie samochodu
if (isset($_GET['delete'])) {
    $index = $_GET['delete'];
    unset($cars[$index]);
    $_SESSION['cars'] = $cars;
    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}

// Edycja samochodu
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editCar'])) {
    $index = $_POST['index'];
    $cars[$index]->make = $_POST['make'];
    $cars[$index]->model = $_POST['model'];
    $cars[$index]->year = $_POST['year'];
    $_SESSION['cars'] = $cars;
    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}

// Wyświetlanie formularza edycji samochodu
if (isset($_GET['edit'])) {
    $index = $_GET['edit'];
    $car = $cars[$index];
    echo "<form method='post' action='{$_SERVER['PHP_SELF']}'>";
    echo "<input type='hidden' name='index' value='$index'>";
    echo "Marka: <input type='text' name='make' value='{$car->make}'><br>";
    echo "Model: <input type='text' name='model' value='{$car->model}'><br>";
    echo "Rok: <input type='text' name='year' value='{$car->year}'><br>";
    echo "<input type='submit' name='editCar' value='Zapisz'>";
    echo "</form>";
    exit;
}

// Wyświetlanie listy samochodów
if (isset($_SESSION['cars'])) {
    $cars = $_SESSION['cars'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Management System</title>
</head>
<body>
<h1>Car Management System</h1>
<div>
    <p>Ilość samochodów: <?php echo isset($cars) ? count($cars) : 0; ?></p>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="carType">Wybierz rodzaj samochodu:</label>
        <select id="carType" name="carType">
            <option value="Car">Car</option>
            <option value="NewCar">New Car</option>
            <option value="InsuranceCar">Insurance Car</option>
        </select><br><br>
        <label for="make">Marka:</label>
        <input type="text" id="make" name="make"><br><br>
        <label for="model">Model:</label>
        <input type="text" id="model" name="model"><br><br>
        <label for="year">Rok produkcji:</label>
        <input type="number" id="year" name="year"><br><br>
        <button type="submit" name="addCar">Dodaj Samochód</button>
    </form>
</div>
<div id="carList">
    <h2>Lista Samochodów</h2>
    <ul>
        <?php
        if (isset($cars)) {
            foreach ($cars as $index => $car) {
                echo "<li>{$car->make} {$car->model} ({$car->year}) - Cena: {$car->calculatePrice()} zł";
                echo " <a href='{$_SERVER['PHP_SELF']}?edit=$index'>Edytuj</a>";
                echo " <a href='{$_SERVER['PHP_SELF']}?delete=$index'>Usuń</a></li>";
            }
        }
        ?>
    </ul>
</div>
</body>
</html>
