<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ankieta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .container {
            margin-top: 50px;
        }

        .result {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .bar {
            background-color: #4CAF50;
            width: 0%;
            padding: 5px;
            color: white;
            margin-bottom: 10px;
            transition: width 0.5s;
            text-align: left;
        }

        button {
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
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<h1>Ankieta</h1>
<div class="container">
    <?php
    function set_cookie_voted()
    {
        setcookie('voted', 'true', time() + (86400 * 30), "/");
    }

    function get_survey_results()
    {
        $file = 'results.json';
        if (file_exists($file)) {
            $data = file_get_contents($file);
            return json_decode($data, true);
        }
        return [];
    }

    function save_survey_results($results)
    {
        $file = 'results.json';
        $json_data = json_encode($results);
        file_put_contents($file, $json_data);
    }

    function vote_os($os)
    {
        $results = get_survey_results();
        if (array_key_exists($os, $results)) {
            $results[$os]++;
        } else {
            $results[$os] = 1;
        }
        save_survey_results($results);
    }


    if (isset($_COOKIE['voted'])) {
        echo "<p>Dziękujemy za udział w ankiecie!</p>";


    } else {
        if (isset($_POST['vote'])) {
            if (isset($_POST['os'])) {
                $selected_os = $_POST['os'];
                echo "<p>Dziękujemy za oddanie głosu na system operacyjny: $selected_os!</p>";
                vote_os($selected_os);
                set_cookie_voted();
            } else {
                echo "<p>Wybierz jedną z opcji przed głosowaniem!</p>";
            }
        } else {
            ?>
            <form method="post">
                <p>Jaki jest Twój ulubiony system operacyjny?</p>
                <input type="radio" id="os1" name="os" value="Windows">
                <label for="os1">Windows</label><br>
                <input type="radio" id="os2" name="os" value="macOS">
                <label for="os2">macOS</label><br>
                <input type="radio" id="os3" name="os" value="Linux">
                <label for="os3">Linux</label><br><br>
                <button type="submit" name="vote">Głosuj</button>
            </form>
            <?php
        }
    }

    $results = get_survey_results();
    arsort($results);
    foreach ($results as $os => $count) {
        $percent = ($count / array_sum($results)) * 100;
        echo "<div class='result'>$os: $count głosów ($percent%)</div>";
        echo "<div class='bar' style='width: $percent%;'>$count</div>";
    }
    ?>
</div>
</body>
</html>
