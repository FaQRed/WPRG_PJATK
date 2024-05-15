<?php
$opinieFile = 'opinie.txt';

function dodajOpinie($opinia, $file) {
    $opinie = file_exists($file) ? unserialize(file_get_contents($file)) : [];
    $opinie[] = $opinia;
    file_put_contents($file, serialize($opinie));
}

// Funkcja do usuwania opinii po indeksie
function usunOpinie($index, $file) {
    $opinie = file_exists($file) ? unserialize(file_get_contents($file)) : [];
    if (isset($opinie[$index])) {
        unset($opinie[$index]);
        file_put_contents($file, serialize($opinie));
    }
}

// Funkcja do resetowania wszystkich opinii
function resetujOpinie($file) {
    file_put_contents($file, '');
}

// Obsługa dodawania nowej opinii
if (isset($_POST['submit'])) {
    $opinia = $_POST['opinia'];
    if (!empty($opinia)) {
        dodajOpinie($opinia, $opinieFile);
    }
}

// Obsługa usuwania opinii
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['index'])) {
    $index = $_GET['index'];
    usunOpinie($index, $opinieFile);
}

// Obsługa resetowania opinii
if (isset($_POST['reset'])) {
    resetujOpinie($opinieFile);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opinie Użytkowników</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        .opinia {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
<h1>Opinie Użytkowników</h1>

<!-- Formularz do dodawania opinii -->
<form method="post">
    <label for="opinia">Dodaj nową opinię:</label><br>
    <textarea name="opinia" id="opinia" cols="30" rows="5" required></textarea><br>
    <button type="submit" name="submit">Dodaj Opinię</button>
</form>

<!-- Lista zapisanych opinii -->
<h2>Lista Opinii:</h2>
<?php
$opinie = file_exists($opinieFile) ? unserialize(file_get_contents($opinieFile)) : [];
if (!empty($opinie)) {
    foreach ($opinie as $index => $opinia) {
        echo '<div class="opinia">';
        echo '<p>' . htmlspecialchars($opinia) . '</p>';
        echo '<a href="?action=delete&index=' . $index . '">Usuń</a>';
        echo '</div>';
    }
} else {
    echo '<p>Brak opinii.</p>';
}
?>

<!-- Przycisk do resetowania wszystkich opinii -->
<form method="post">
    <button type="submit" name="reset">Resetuj Opinie</button>
</form>
</body>

</html>
