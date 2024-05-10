<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Size Checker</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container">
    <h1 class="mt-4">File Size Checker</h1>
    <form action="index.php" method="post" class="mt-4">
        <div class="form-group">
            <label for="filename">Podaj nazwę pliku lub katalogu:</label>
            <input type="text" class="form-control" id="filename" name="filename" required>
        </div>
        <button type="submit" class="btn btn-primary">Wyślij</button>
    </form>

    <?php
    require_once('functions.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $filename = $_POST['filename'];

        if (file_exists($filename)) {
            echo "<h2 class='mt-4'>Rozmiar pliku/katalogu: " . htmlspecialchars($filename) . "</h2>";
            echo "<div class='mt-3'>";
            echo displayFileSize($filename);
            echo "</div>";
        } else {
            echo "<div class='alert alert-danger mt-4'>Podany plik lub katalog nie istnieje.</div>";
        }
    }
    ?>
</div>
</body>

</html>
