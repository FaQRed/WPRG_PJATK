<?php
session_start();
if ($_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Witamy</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h2>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>Logged successfully.</p>
    <a href="logout.php">Logout</a>
</div>
</body>
</html>
