<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $value = $_POST['value'];
    $expire = !empty($_POST['expire']) ? strtotime($_POST['expire']) : 0;
    setcookie($name, $value, $expire);
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dodaj Ciasteczko</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h2>Dodaj Ciasteczko</h2>
    <form action="add_cookie.php" method="post">
        <label for="name">Nazwa:</label>
        <input type="text" name="name" id="name" required>
        <label for="value">Wartość:</label>
        <input type="text" name="value" id="value" required>
        <label for="expire">Data wygaśnięcia (opcjonalnie):</label>
        <input type="date" name="expire" id="expire">
        <input type="submit" value="Dodaj">
    </form>
    <p><a href="index.php">Powrót</a></p>
</div>
</body>
</html>
