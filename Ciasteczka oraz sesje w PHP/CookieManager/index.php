<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'delete') {
    setcookie($_POST['name'], '', time() - 3600);
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Menadżer Ciasteczek</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h2>Wszystkie Ciasteczka</h2>
    <table>
        <thead>
        <tr>
            <th>Nazwa</th>
            <th>Wartość</th>
            <th>Opcje</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($_COOKIE as $name => $value): ?>
            <tr>
                <td><?php echo htmlspecialchars($name); ?></td>
                <td><?php echo htmlspecialchars($value); ?></td>
                <td>
                    <a href="edit_cookie.php?name=<?php echo urlencode($name); ?>">Edytuj</a>
                    <form action="index.php" method="post" style="display:inline;">
                        <input type="hidden" name="name" value="<?php echo htmlspecialchars($name); ?>">
                        <input type="hidden" name="action" value="delete">
                        <input type="submit" value="Usuń">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <p><a href="add_cookie.php">Dodaj Ciasteczko</a></p>
    <p><a href="search_cookie.php">Wyszukaj Ciasteczko</a></p>
</div>
</body>
</html>
