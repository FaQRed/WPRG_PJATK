<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Counter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .container {
            margin-top: 50px;
        }

        .counter {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .reset-button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 20px;
            cursor: pointer;
        }

        .reset-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<h1>Visitor Counter</h1>
<div class="container">
    <?php

    function set_visit_cookie($count) {
        setcookie('visit_count', $count, time() + (86400 * 30), "/");
    }
    function get_visit_count() {
        return isset($_COOKIE['visit_count']) ? $_COOKIE['visit_count'] : 0;
    }
    if (get_visit_count() < 5) {
        $visit_count = get_visit_count();
        $visit_count++;
        set_visit_cookie($visit_count);
    }

    $visit_count = get_visit_count();
    echo "<div class='counter'>Liczba odwiedzin: $visit_count</div>";

    if ($visit_count >= 5) {
        echo "<div>Osiągnąłeś 5 odwiedzin. Zresetuj!</div>";
        echo "<form method='post' class='reset-button-form'>";
        echo "<button class='reset-button' name='reset'>Resetuj licznik</button>";
        echo "</form>";
    }


    if (isset($_POST['reset'])) {
        set_visit_cookie(0);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
    ?>
</div>
</body>
</html>
