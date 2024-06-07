<?php
$servername = "szuflandia.pjwstk.edu.pl";
$username = "s29868";
$password = "Kir.Sank";
$dbname = "s29868";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
}


function tableExists($conn, $table)
{
    $result = $conn->query("SHOW TABLES LIKE '$table'");
    return $result->num_rows > 0;
}


function createTable($conn)
{
    $sql = "CREATE TABLE Student (
        StudentID INT PRIMARY KEY AUTO_INCREMENT,
        Firstname VARCHAR(255),
        Secondname VARCHAR(255),
        Salary INT,
        DateOfBirth DATE
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table Student created successfully.";
    } else {
        echo "Error creating table: " . $conn->error;

    }
}

function deleteTable($conn)
{
    $sql = "DROP TABLE IF EXISTS Student";
    if ($conn->query($sql) === TRUE) {
        echo "Table Student deleted successfully.";
    } else {
        echo "Error deleting table: " . $conn->error;
    }

}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    deleteTable($conn);
}

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
        if(!tableExists($conn, "Student")){
            createTable($conn);
        }else{
            echo "Table Student already exists.";
        }

}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage MySQL Table</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Manage MySQL Table</h1>

<form method="post">
    <button type="submit" name="delete">Delete Table</button>
</form>
<form method="post">
    <button type="submit" name="create">Create Table</button>
</form>
</body>
</html>