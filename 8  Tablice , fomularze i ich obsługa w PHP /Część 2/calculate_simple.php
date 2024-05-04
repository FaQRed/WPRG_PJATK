<?php
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operation = $_POST["operation"];
    $result = 0;

    switch ($operation) {
        case "add":
            $result = $num1 + $num2;
            break;
        case "subtract":
            $result = $num1 - $num2;
            break;
        case "multiply":
            $result = $num1 * $num2;
            break;
        case "divide":
            if ($num2 != 0) {
                $result = $num1 / $num2;
            } else {
                $result = "Nie można dzielić przez zero!";
            }
            break;
        default:
            $result = "Nieznana operacja!";
            break;
    }

    echo "<!DOCTYPE html>
<html lang=\"pl\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Wynik</title>
    <link rel=\"stylesheet\" href=\"calc.css\">
</head>
<body>

<div class=\"result-container\">
    <h2>Wynik</h2>
    <div class=\"result\">
        <p>Wynik: $result</p>
        <a href=\"calculator.html\" class=\"return-btn\">Powrót do kalkulatora</a>
    </div>
</div>

</body>
</html>";


