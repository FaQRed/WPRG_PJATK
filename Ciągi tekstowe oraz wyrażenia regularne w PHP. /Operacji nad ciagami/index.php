<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operacje na ciągach znaków</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        input, select, button {
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            border-top: 1px solid #ccc;
        }
    </style>
</head>
<body>
<div class="container">
    <form method="post">
        <label for="text">Wpisz tekst:</label>
        <input type="text" id="text" name="text" required>

        <label for="operation">Wybierz operację:</label>
        <select id="operation" name="operation">
            <option value="reverse">Odwróć ciąg znaków</option>
            <option value="uppercase">Zamień na wielkie litery</option>
            <option value="lowercase">Zamień na małe litery</option>
            <option value="length">Policz liczbę znaków</option>
            <option value="trim">Usuń białe znaki</option>
        </select>

        <button type="submit">Wykonaj</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $text = $_POST['text'];
        $operation = $_POST['operation'];
        $result = "";

        switch ($operation) {
            case "reverse":
                $result = strrev($text);
                break;
            case "uppercase":
                $result = strtoupper($text);
                break;
            case "lowercase":
                $result = strtolower($text);
                break;
            case "length":
                $result = strlen($text);
                break;
            case "trim":
                $result = trim($text);
                break;
            default:
                $result = "Nieznana operacja.";
                break;
        }

        echo "<div class='result'>Wynik: $result</div>";
    }
    ?>
</div>
</body>
</html>
