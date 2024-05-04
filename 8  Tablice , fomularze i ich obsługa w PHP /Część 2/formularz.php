<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];


    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $phone = htmlspecialchars(trim($_POST["phone"]));
    $subject = htmlspecialchars(trim($_POST["subject"]));
    $message = htmlspecialchars(trim($_POST["message"]));
    $options = isset($_POST["options"]) ? $_POST["options"] : [];
    $radioOption = isset($_POST["radioOption"]) ? $_POST["radioOption"] : "";

    if (empty($name)) {
        $errors[] = "Proszę podać Twoje Imię i Nazwisko.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Proszę podać poprawny adres email.";
    }

    if (empty($phone) || !preg_match("/^[0-9]{9,15}$/", $phone)) {
        $errors[] = "Proszę podać poprawny numer telefonu (od 9 do 15 cyfr).";
    }

    if (empty($subject)) {
        $errors[] = "Proszę wybrać temat.";
    }

    if (empty($message)) {
        $errors[] = "Proszę wpisać treść wiadomości.";
    }

    if (empty($options)) {
        $errors[] = "Proszę wybrać przynajmniej jedną opcję.";
    }

    if (empty($radioOption)) {
        $errors[] = "Proszę wybrać jedną opcję.";
    }

    if (!empty($errors)) {
        echo "<h2>Błędy:</h2><ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul><a href=\"formularz_kontaktowy.html\" class=\"return-btn\">Wróć i popraw formularz</a>";
    } else {

        echo "<h2>Dane:</h2>";
        echo "<ul>";
        echo "<li><strong>Twoje Imię i Nazwisko:</strong> $name</li>";
        echo "<li><strong>Twój Email:</strong> $email</li>";
        echo "<li><strong>Twój Telefon:</strong> $phone</li>";
        echo "<li><strong>Temat:</strong> $subject</li>";
        echo "<li><strong>Wiadomość:</strong> $message</li>";
        echo "<li><strong>1 opcja:</strong> " . implode(", ", $options) . "</li>";
        echo "<li><strong>2 opcja:</strong> $radioOption</li>";
        echo "</ul>";

        echo "
        <a href=\"formularz_kontaktowy.html\" class=\"return-btn\">Powrót do formularza</a>
     ";
    }
}
?>



