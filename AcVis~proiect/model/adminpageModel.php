<?php
$servername = "localhost";
$username = "root";
$password = "Raluca.andreea123";
$dbname = "tehnologii_web";
$table = "screen_actor_guild_awards";
$port = 3306;

function addRecord($id, $year, $category, $full_name, $show, $won) {
    global $servername, $username, $password, $dbname, $port, $table;

    $conn = new mysqli($servername, $username, $password, $dbname, $port);
    if ($conn->connect_error) {
        return json_encode(array("status" => "error", "message" => "Connection failed: " . $conn->connect_error));
    }

    $sql_insert = "INSERT INTO `$table` (id, year, category, full_name, `show`, won) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql_insert);
    $stmt->bind_param("ssssss", $id, $year, $category, $full_name, $show, $won);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        return json_encode(array("status" => "success", "message" => "Record added successfully."));
    } else {
        $stmt->close();
        $conn->close();
        return json_encode(array("status" => "error", "message" => "Failed to add record."));
    }
}

function deleteRecord($delete_id) {
    global $servername, $username, $password, $dbname, $port, $table;

    $conn = new mysqli($servername, $username, $password, $dbname, $port);
    if ($conn->connect_error) {
        return json_encode(array("status" => "error", "message" => "Connection failed: " . $conn->connect_error));
    }

    $sql_delete = "DELETE FROM `$table` WHERE id = ?";
    $stmt = $conn->prepare($sql_delete);
    $stmt->bind_param("s", $delete_id);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        return json_encode(array("status" => "success", "message" => "Record deleted successfully."));
    } else {
        $stmt->close();
        $conn->close();
        return json_encode(array("status" => "error", "message" => "Failed to delete record."));
    }
}

function changePassword($user_name, $new_password, $confirm_password, $current_password) {
    global $servername, $username, $password, $dbname, $port;

    $conn = new mysqli($servername, $username, $password, $dbname, $port);
    if ($conn->connect_error) {
        return json_encode(array("status" => "error", "message" => "Connection failed: " . $conn->connect_error));
    }
    $user_name = $_SESSION['name'];
  
    $sql_select = "SELECT password FROM utilizatori WHERE name = ?";
    $stmt = $conn->prepare($sql_select);
    $stmt->bind_param("s", $user_name);
    $stmt->execute();
    $stmt->store_result();
  
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($stored_password);
        $stmt->fetch();
  
        if ($current_password === $stored_password) {
            $sql_update = "UPDATE utilizatori SET password = ? WHERE name = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("ss", $new_password, $user_name);
        }
    } 

    if ($stmt_update->execute()) {
        $stmt_update->close();
        $conn->close();
        return json_encode(array("status" => "success", "message" => "Password changed successfully."));
    } else {
        $stmt_update->close();
        $conn->close();
        return json_encode(array("status" => "error", "message" => "Failed to change password."));
    }
}
?>
