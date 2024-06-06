<?php
session_start();

$correct_login = 'admin';
$correct_password = 'admin';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if ($login === $correct_login && $password === $correct_password) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $login;
        header('Location: logged.php');
    } else {
        $_SESSION['error'] = 'Error Login or Password';
        header('Location: login.php');
        exit();
    }
} else {
    header('Location: login.php');
    exit();
}
