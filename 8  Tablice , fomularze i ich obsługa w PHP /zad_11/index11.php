<!DOCTYPE html>
<html lang="en">
<head>
    <title>Calculator Result</title>
    <link rel="stylesheet" href="index11.css">
</head>
<body>
<div class="calculator">
    <h2>Kalkulator zbiorow</h2>


    <?php
    $set1 = $_POST['set1'];
    $set2 = $_POST['set2'];
    $operation = $_POST['operation'];


    $array1 = explode(',', $set1);
    $array2 = explode(',', $set2);


    switch ($operation) {
        case 'union':
            $result = array_unique(array_merge($array1, $array2));
            break;
        case 'intersection':
            $result = array_intersect($array1, $array2);
            break;
        case 'difference':
            $result = array_diff($array1, $array2);
            break;
        case 'symmetric_difference':
            $result = array_merge(array_diff($array1, $array2), array_diff($array2, $array1));
            break;
        default:
            $result = [];
            break;
    }


    echo "<p><strong>Wynik:</strong> " . implode(', ', $result) . "</p>";
    ?>

    <a href="index.html">Back</a>
</div>
</body>
</html>


