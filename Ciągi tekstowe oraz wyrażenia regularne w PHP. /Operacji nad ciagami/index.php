<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>String Operations</title>
    <link rel="stylesheet" href="ciag_operations.css">
</head>
<body>
<div class="container">
    <h2>String Operations</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="inputString">Enter a string:</label>
        <input type="text" id="inputString" name="inputString">
        <label for="operation">Select an operation:</label>
        <select id="operation" name="operation">
            <option value="reverse">Reverse String</option>
            <option value="uppercase">Uppercase</option>
            <option value="lowercase">Lowercase</option>
            <option value="length">Count Characters</option>
            <option value="trim">Trim White Space</option>
        </select>
        <button type="submit" name="submit">Execute</button>
    </form>

    <div class="result">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $inputString = $_POST["inputString"];
            $operation = $_POST["operation"];

            if (empty($inputString)) {
                echo "<p class='error'>Please enter a string.</p>";
            } else {
                switch ($operation) {
                    case "reverse":
                        echo "<p>" . strrev($inputString) . "</p>";
                        break;
                    case "uppercase":
                        echo "<p>" . strtoupper($inputString) . "</p>";
                        break;
                    case "lowercase":
                        echo "<p>" . strtolower($inputString) . "</p>";
                        break;
                    case "length":
                        echo "<p>Number of characters: " . strlen($inputString) . "</p>";
                        break;
                    case "trim":
                        echo "<p>" . trim($inputString) . "</p>";
                        break;
                    default:
                        echo "<p class='error'>Invalid operation selected.</p>";
                }
            }
        }
        ?>
    </div>
</div>
</body>
</html>
