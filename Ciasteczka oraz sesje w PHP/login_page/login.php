<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: logged.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Formularz logowania</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h2>Login page</h2>
    <form action="logining.php" method="post">
        <label for="login">Login:</label>
        <input type="text" name="login" id="login" required>
        <label for="password">Hasło:</label>
        <input type="password" name="password" id="password" required>
        <input type="submit" value="Login">
    </form>

    <?php
    if (isset($_SESSION['error'])) {
        echo '<p class="error">' . $_SESSION['error'] . '</p>';
        unset($_SESSION['error']);
    }
    ?>
</div>
</body>
</html>
