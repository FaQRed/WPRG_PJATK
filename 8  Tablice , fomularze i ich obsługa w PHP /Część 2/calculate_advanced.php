<?php
    $num = $_POST["num"];
    $operation = $_POST["operation"];
    $result = 0;

    switch ($operation) {
        case "cos":
            $result = cos($num);
            break;
        case "sin":
            $result = sin($num);
            break;
        case "tan":
            $result = tan($num);
            break;
        case "binToDec":
            $result = bindec($num);
            break;
        case "decToBin":
            $result = decbin($num);
            break;
        case "decToHex":
            $result = dechex($num);
            break;
        case "hexToDec":
            $result = hexdec($num);
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
