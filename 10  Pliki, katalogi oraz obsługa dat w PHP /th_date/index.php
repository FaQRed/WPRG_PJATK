<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulatory Czasu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Oblicz wiek i dni robocze</h1>

    <div class="form-container">
        <h2>Oblicz wiek i czas lokalny</h2>
        <form method="POST" action="">
            <label for="birthdate">Data urodzenia (d-m-Y):</label>
            <input type="text" id="birthdate" name="birthdate" required>

            <label for="timezone">Strefa czasowa:</label>
            <select id="timezone" name="timezone" required>
                <?php
                $timezones = DateTimeZone::listIdentifiers();
                foreach ($timezones as $timezone) {
                    echo "<option value=\"$timezone\">$timezone</option>";
                }
                ?>
            </select>

            <button type="submit" name="age_time_submit">Oblicz wiek i czas</button>
        </form>
        <div id="age-time-result">
            <?php
            if (isset($_POST['age_time_submit'])) {
                $birthdate = $_POST['birthdate'];
                $timezone = $_POST['timezone'];

                try {
                    $birthDateObj = DateTime::createFromFormat('d-m-Y', $birthdate);
                    if (!$birthDateObj) {
                        throw new Exception('Nieprawidłowy format daty.');
                    }

                    $now = new DateTime('now', new DateTimeZone($timezone));
                    $age = $now->diff($birthDateObj)->y;
                    $localTime = $now->format('H:i:s');

                    echo "Wiek: $age lat.<br>Czas lokalny: $localTime.";
                } catch (Exception $e) {
                    echo "Błąd: " . $e->getMessage();
                }
            }
            ?>
        </div>
    </div>

    <div class="form-container">
        <h2>Oblicz dni robocze</h2>
        <form method="POST" action="">
            <label for="startdate">Data początkowa (d-m-Y):</label>
            <input type="text" id="startdate" name="startdate" required>

            <label for="enddate">Data końcowa (d-m-Y):</label>
            <input type="text" id="enddate" name="enddate" required>

            <button type="submit" name="workdays_submit">Oblicz dni robocze</button>
        </form>
        <div id="workdays-result">
            <?php
            if (isset($_POST['workdays_submit'])) {
                $startdate = $_POST['startdate'];
                $enddate = $_POST['enddate'];

                try {
                    $startDateObj = DateTime::createFromFormat('d-m-Y', $startdate);
                    $endDateObj = DateTime::createFromFormat('d-m-Y', $enddate);
                    if (!$startDateObj || !$endDateObj) {
                        throw new Exception('Nieprawidłowy format daty.');
                    }

                    $workdaysCount = 0;
                    while ($startDateObj <= $endDateObj) {
                        if ($startDateObj->format('N') < 6) {
                            $workdaysCount++;
                        }
                        $startDateObj->modify('+1 day');
                    }

                    echo "Liczba dni roboczych: $workdaysCount.";
                } catch (Exception $e) {
                    echo "Błąd: " . $e->getMessage();
                }
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>