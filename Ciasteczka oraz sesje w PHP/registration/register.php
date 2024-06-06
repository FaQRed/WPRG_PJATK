<?php
session_start();

function validate_password($password) {
    return preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*\W).{6,}$/', $password);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Niepoprawny adres email.';
    } elseif (!validate_password($password)) {
        $_SESSION['error'] = 'Hasło musi składać się z co najmniej 6 znaków, zawierać co najmniej 1 wielką literę, cyfrę oraz znak specjalny.';
    } else {
        $users = file_exists('users.txt') ? file('users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
        $email_exists = false;

        foreach ($users as $user) {
            $user_data = explode('|', $user);
            if ($user_data[2] === $email) {
                $email_exists = true;
                break;
            }
        }

        if ($email_exists) {
            $_SESSION['error'] = 'This email is already registered';
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $new_user = $first_name . '|' . $last_name . '|' . $email . '|' . $hashed_password . "\n";
            file_put_contents('users.txt', $new_user, FILE_APPEND);
            $_SESSION['success'] = 'Registration successfully completed';
            header('Location: login.php');
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h2>Registration</h2>
    <form action="register.php" method="post">
        <label for="first_name">Name:</label>
        <input type="text" name="first_name" id="first_name" required>
        <label for="last_name">Surname:</label>
        <input type="text" name="last_name" id="last_name" required>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <input type="submit" value="Register">
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
