<?php
function get_db_connection() {
    $servername = "localhost";
    $username = "root";
    $password = "123321445";
    $dbname = "tw";
    $port = 3306;
    $conn = new mysqli($servername, $username, $password, $dbname, $port);

    if ($conn->connect_error) {
        die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
    }

    return $conn; 
}
?>
