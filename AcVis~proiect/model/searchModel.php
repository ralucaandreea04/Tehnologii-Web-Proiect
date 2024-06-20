<?php
require_once __DIR__.'/../db.php';

function searchActor($searchQuery) {
    $conn = get_db_connection();
    $table = "screen_actor_guild_awards";
    $sql = "SELECT * FROM $table WHERE full_name ='$searchQuery'";
    $result = $conn->query($sql);

    if ($result->num_rows >= 1) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return false;
    }
}

?>
