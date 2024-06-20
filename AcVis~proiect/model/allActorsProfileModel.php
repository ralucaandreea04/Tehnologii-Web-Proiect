<?php
require_once __DIR__.'/../db.php';

function get_actor_name_($actor_id) {
    $conn = get_db_connection();
    $table = "screen_actor_guild_awards";
    $query = "SELECT full_name FROM $table WHERE id = $actor_id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['full_name'];
    } else {
        return "Unknown";
    }
}

function get_actor_awards_($actor_name) {
    $conn = get_db_connection();
    $table = "screen_actor_guild_awards";
    $query = "SELECT category, year, `show` FROM $table WHERE full_name = '$actor_name'";
    $result = $conn->query($query);

    $awards = [];

    if ($result->num_rows > 0) {
        while ($award_row = $result->fetch_assoc()) {
            $awards[] = $award_row;
        }
    }

    return $awards;
}
?>
