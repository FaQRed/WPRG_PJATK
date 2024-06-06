<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Witamy</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h2>Witamy, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>Logowanie powiodło się.</p>
    <a href="logout.php">Wyloguj</a>
</div>
</body>
</html>
