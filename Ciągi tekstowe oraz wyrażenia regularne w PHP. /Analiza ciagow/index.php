<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaawansowana analiza ciągów znaków</title>
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
            width: 400px;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Zaawansowana analiza ciągów znaków</h2>
    <form method="post">
        <label for="text">Wpisz tekst:</label>
        <input type="text" id="text" name="text" required>

        <label for="operation">Wybierz operację:</label>
        <select id="operation" name="operation">
            <option value="unique_words">Ekstrakcja unikalnych słów</option>
            <option value="sort_asc">Sortowanie alfabetyczne rosnąco</option>
            <option value="sort_desc">Sortowanie alfabetyczne malejąco</option>
        </select>

        <button type="submit">Analizuj</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $text = $_POST['text'];
        $operation = $_POST['operation'];
        $words = str_word_count(strtolower($text), 1);
        $result = "";

        switch ($operation) {
            case "unique_words":
                $word_count = array_count_values($words);
                arsort($word_count);
                echo "<div class='result'><h3>Wynik:</h3><table><tr><th>Słowo</th><th>Częstotliwość</th></tr>";
                foreach ($word_count as $word => $count) {
                    echo "<tr><td>$word</td><td>$count</td></tr>";
                }
                echo "</table></div>";
                break;
            case "sort_asc":
                sort($words);
                echo "<div class='result'><h3>Wynik:</h3><p>" . implode(", ", $words) . "</p></div>";
                break;
            case "sort_desc":
                rsort($words);
                echo "<div class='result'><h3>Wynik:</h3><p>" . implode(", ", $words) . "</p></div>";
                break;
            default:
                echo "<div class='result'>Nieznana operacja.</div>";
                break;
        }
    }
    ?>
</div>
</body>
</html>
