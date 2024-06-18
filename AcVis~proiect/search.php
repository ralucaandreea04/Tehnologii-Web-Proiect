<?php
$servername = "localhost";
$username = "root"; 
$dbname = "tehnologii_web";
$password = "Raluca.andreea123";
$table = "screen_actor_guild_awards"; 
$port = 3306;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchQuery = $_POST['search'];
    $conn = new mysqli($servername, $username, $password, $dbname, $port);

    if ($conn->connect_error) {
        die("Conectare eșuată: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM $table WHERE full_name LIKE '%$searchQuery%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Nume: " . $row["full_name"] . "<br>";
        }
    } else {
        echo "Niciun actor găsit";
    }
    $conn->close();
}
?>