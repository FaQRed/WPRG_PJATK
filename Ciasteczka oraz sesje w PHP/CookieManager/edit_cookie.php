<?php
if (!isset($_GET['name'])) {
    header('Location: index.php');
    exit();
}

$name = $_GET['name'];
$value = isset($_COOKIE[$name]) ? $_COOKIE[$name] : '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_value = $_POST['value'];
    $expire = isset($_POST['expire']) && !empty($_POST['expire']) ? strtotime($_POST['expire']) : 0;
    setcookie($name, $new_value, $expire);
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Edytuj Ciasteczko</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h2>Edytuj Ciasteczko</h2>
    <form action="edit_cookie.php?name=<?php echo urlencode($name); ?>" method="post">
        <label for="name">Nazwa:</label>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name); ?>" disabled>
        <label for="value">Wartość:</label>
        <input type="text" name="value" id="value" value="<?php echo htmlspecialchars($value); ?>" required>
        <label for="expire">Data wygaśnięcia (opcjonalnie):</label>
        <input type="date" name="expire" id="expire">
        <input type="submit" value="Zapisz">
    </form>
    <p><a href="index.php">Powrót</a></p>
</div>
</body>
</html>
