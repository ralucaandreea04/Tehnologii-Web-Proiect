<?php
$servername = "localhost";
$username = "root";
$password = "Raluca.andreea123";
$dbname = "tehnologii_web";
$table = "screen_actor_guild_awards";
$port = 3306;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchQuery = $_POST['search'];
    echo $searchQuery;
    $conn = new mysqli($servername, $username, $password, $dbname, $port);

    if ($conn->connect_error) {
        die("Conectare eșuată: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM $table WHERE full_name ='$searchQuery'";
    $result = $conn->query($sql);

    if ($result->num_rows >= 1) {
        $row = $result->fetch_assoc();
        $actorId = $row["id"];
        $conn->close();
        header("Location: actor.php?id=$actorId");
        exit;
    }
    else {
        echo "Niciun actor găsit";
    }

    $conn->close();
}
?>
