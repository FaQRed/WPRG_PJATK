<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analyser and Transformer of Text with Regex in PHP</title>
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
    </style>
    <script>
        function toggleReplaceInput() {
            var operation = document.getElementById("operation").value;
            var replaceInput = document.getElementById("replaceInput");
            if (operation === "replace") {
                replaceInput.style.display = "block";
            } else {
                replaceInput.style.display = "none";
            }
        }
    </script>
</head>
<body>
<div class="container">
    <h2>Analyser and Transformer of Text with Regex in PHP</h2>
    <form method="post">
        <label for="text">Enter text:</label>
        <input type="text" id="text" name="text" required>

        <label for="pattern">Enter Regex Pattern:</label>
        <input type="text" id="pattern" name="pattern" required>

        <label for="operation">Choose Operation:</label>
        <select id="operation" name="operation" onchange="toggleReplaceInput()">
            <option value="match">Find Matches</option>
            <option value="match_positions">Find Matches with Positions</option>
            <option value="replace">Replace</option>
            <option value="validate">Validate</option>
        </select>

        <div id="replaceInput" style="display:none;">
            <label for="replacement">Replacement Text:</label>
            <input type="text" id="replacement" name="replacement">
        </div>

        <button type="submit">Execute</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $text = $_POST['text'];
        $pattern = $_POST['pattern'];
        $operation = $_POST['operation'];
        $result = "";

        switch ($operation) {
            case "match":
                preg_match_all($pattern, $text, $matches);
                $result = "Matches found: " . implode(", ", $matches[0]);
                break;
            case "match_positions":
                preg_match_all($pattern, $text, $matches, PREG_OFFSET_CAPTURE);
                $result = "Matches found: ";
                foreach ($matches[0] as $match) {
                    $result .= "Match found at position " . $match[1] . ": " . $match[0] . "<br>";
                }
                break;
            case "replace":
                $replacement = $_POST['replacement'];
                $result = preg_replace($pattern, $replacement, $text);
                break;
            case "validate":
                if (preg_match($pattern, $text)) {
                    $result = "True";
                } else {
                    $result = "False";
                }
                break;
            default:
                $result = "Unknown operation.";
                break;
        }

        echo "<div class='result'>Result:<br>$result</div>";
    }
    ?>
</div>
</body>
</html>
