<?php
$counterFile = 'counter.txt';
function increaseCounter($file) {
    if (file_exists($file)) {
        $count = (int) file_get_contents($file);
        $count++;
        file_put_contents($file, $count);
    } else {
        file_put_contents($file, 1);
    }
}

function resetCounter($file) {
    if (file_exists($file)) {
        file_put_contents($file, -1);
    }
}

increaseCounter($counterFile);
if (isset($_POST['reset'])) {
    resetCounter($counterFile);
    header('Location: index.php' );
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Counter</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>

        body {
            padding-top: 50px;
            text-align: center;
        }
    </style>
</head>

<body>
<div class="container">
    <h1 class="mt-4">Strona z licznikiem odwiedzin</h1>
    <h2>Liczba odwiedzin: <?php echo file_get_contents($counterFile); ?></h2>
    <form method="post" class="mt-4">
        <button type="submit" name="reset" class="btn btn-danger">Zresetuj licznik</button>
    </form>
</div>

</body>

</html>
