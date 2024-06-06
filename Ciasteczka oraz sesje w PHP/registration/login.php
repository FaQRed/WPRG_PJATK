<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: logged.php');
    exit();
}

if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $users = file_exists('users.txt') ? file('users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
    $login_successful = false;

    foreach ($users as $user) {
        $user_data = explode('|', $user);
        if ($user_data[2] === $login && password_verify($password, $user_data[3])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user_data[0] . ' ' . $user_data[1];
            $login_successful = true;
            break;
        }
    }

    if ($login_successful) {
        header('Location: logged.php');
        exit();
    } else {
        $_SESSION['error'] = 'Invalid username or password';
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Login page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h2>Login page</h2>
    <form action="login.php" method="post">
        <label for="login">Login (Email):</label>
        <input type="text" name="login" id="login" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <input type="submit" value="Login">
    </form>

    <?php
    if (isset($_SESSION['error'])) {
        echo '<p class="error">' . $_SESSION['error'] . '</p>';
        unset($_SESSION['error']);
    }

    if (isset($_SESSION['success'])) {
        echo '<p class="success">' . $_SESSION['success'] . '</p>';
        unset($_SESSION['success']);
    }
    ?>

    <a href="register.php">Register</a>
</div>
</body>
</html>
