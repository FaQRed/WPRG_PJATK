<?php
$search_results = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $query = $_POST['query'];
    foreach ($_COOKIE as $name => $value) {
        if (stripos($name, $query) !== false || stripos($value, $query) !== false) {
            $search_results[$name] = $value;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wyszukaj Ciasteczko</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Wyszukaj Ciasteczko</h2>
        <form action="search_cookie.php" method="post">
            <label for="query">Wyszukaj:</label>
            <input type="text" name="query" id="query" required>
            <input type="submit" value="Szukaj">
        </form>

        <?php if (!empty($search_results)): ?>
        <h3>Wyniki Wyszukiwania</h3>
        <table>
            <thead>
                <tr>
                    <th>Nazwa</th>
                    <th>Wartość</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($search_results as $name => $value): ?>
                <tr>
                    <td><?php echo htmlspecialchars($name); ?></td>
                    <td><?php echo htmlspecialchars($value); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
            <p>Brak wyników dla zapytania "<?php echo htmlspecialchars($query); ?>".</p>
        <?php endif; ?>
        <p><a href="index.php">Powrót</a></p>
    </div>
</body>
</html>