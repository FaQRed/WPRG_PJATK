<?php
if (!isset($_GET['name'])) {
    header('Location: index.php');
    exit();
}

$name = $_GET['name'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['confirm']) && $_POST['confirm'] == 'yes') {
        setcookie($name, '', time() - 3600, '/');
    }
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Usuń Ciasteczko</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h2>Usuń Ciasteczko</h2>
    <form action="delete_cookie.php?name=<?php echo urlencode($name); ?>" method="post">
        <input type="hidden" name="name" value="<?php echo htmlspecialchars($name); ?>">
        <input type="submit" name="confirm" value="yes" class="button"> Tak
        <input type="submit" name="confirm" value="no" class="button"> Nie
    </form>
    <p><a href="index.php">Powrót</a></p>
</div>
</body>
</html>
