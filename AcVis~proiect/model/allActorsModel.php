<?php
require_once __DIR__.'/../db.php';

function getAllActors() {
    $conn = get_db_connection();
    $table = "screen_actor_guild_awards";
    $sql = "SELECT id, full_name, LEFT(year, 4) AS year FROM $table WHERE LENGTH(full_name) > 0";
    $result = $conn->query($sql);

    $actors_by_year = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $actor_id = $row['id'];
            $actor_name = $row['full_name'];
            $year = $row['year'];

            if (!isset($actors_by_year[$year])) {
                $actors_by_year[$year] = array();
            }
            $actors_by_year[$year][] = array('id' => $actor_id, 'name' => $actor_name);
        }
    }

    return $actors_by_year;
}

?>
