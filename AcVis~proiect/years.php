<?php
$servername = "localhost";
$username = "root";
$password = "123321445";
$dbname = "tw";
$table = "screen_actor_guild_awards";
$port = 3306;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
}

$sql = "SELECT DISTINCT LEFT(year, 4) AS yearYear FROM $table";
$result = $conn->query($sql);

echo '<ul class="submenu">';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $year = $row['yearYear'];
        echo '<li>';
        echo '<label for="submenu' . $year . '">' . $year . '</label>';
        echo '<input type="checkbox" id="submenu' . $year . '" class="menu-checkbox">';
        echo '<div class="menu">';
        echo '<label class="menu-toggle" for="submenu' . $year . '"></label>';
        echo '<ul class="submenu">';

        $sql_actors = "SELECT id, full_name FROM $table WHERE LEFT(year, 4) = '$year' AND LENGTH(full_name) > 0";
        $result_actors = $conn->query($sql_actors);
        if ($result_actors->num_rows > 0) {
            while ($row_actor = $result_actors->fetch_assoc()) {
                $actor_id = $row_actor['id'];
                $actor_name = $row_actor['full_name'];
                echo '<li><a href="actor.php?id=' . $actor_id . '">' . $actor_name . '</a></li>';
            }
        } else {
            echo '<li><a href="#">Niciun actor găsit</a></li>';
        }

        echo '</ul>';
        echo '</div>';
        echo '</li>';
    }
} else {
    echo '<li>Nu s-au găsit rezultate.</li>';
}
echo '</ul>';

$conn->close();
?>
