<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalendarz</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Kalendarz</h1>
<?php
$month = isset($_GET['month']) ? intval($_GET['month']) : date('m');
$year = isset($_GET['year']) ? intval($_GET['year']) : date('Y');

if ($month < 1) {
    $month = 12;
    $year--;
} elseif ($month > 12) {
    $month = 1;
    $year++;
}
$prevMonth = $month - 1;
$nextMonth = $month + 1;
function build_calendar($month, $year) {
    $daysOfWeek = ['Niedziela', 'Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota'];
    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
    $numberDays = date('t', $firstDayOfMonth);
    $dateComponents = getdate($firstDayOfMonth);
    $monthName = $dateComponents['month'];
    $dayOfWeek = $dateComponents['wday'];

    $calendar = "<table class='calendar'>";
    $calendar .= "<caption>$monthName $year</caption>";
    $calendar .= "<thead><tr>";

    foreach ($daysOfWeek as $day) {
        $calendar .= "<th>$day</th>";
    }

    $calendar .= "</tr></thead><tbody><tr>";
    if ($dayOfWeek > 0) {
        $calendar .= "<td colspan='$dayOfWeek'>&nbsp;</td>";
    }

    $currentDay = 1;
    while ($currentDay <= $numberDays) {
        if ($dayOfWeek == 7) {
            $dayOfWeek = 0;
            $calendar .= "</tr><tr>";
        }

        $date = "$year-$month-$currentDay";
        $calendar .= "<td><div class='day'>$currentDay";
        if (isset($events[$date])) {
            foreach ($events[$date] as $event) {
                $calendar .= "<div class='event'>$event</div>";
            }
        }
        $calendar .= "</div></td>";

        $currentDay++;
        $dayOfWeek++;
    }

    if ($dayOfWeek != 7) {
        $remainingDays = 7 - $dayOfWeek;
        $calendar .= "<td colspan='$remainingDays'>&nbsp;</td>";
    }

    $calendar .= "</tr></tbody></table>";
    return $calendar;
}

echo "<div class='nav'>
            <a href='?month=$prevMonth&year=$year'>Poprzedni miesiąc</a>
            <a href='?month=$nextMonth&year=$year'>Następny miesiąc</a>
          </div>";

echo build_calendar($month, $year);
?>


</body>
</html>
