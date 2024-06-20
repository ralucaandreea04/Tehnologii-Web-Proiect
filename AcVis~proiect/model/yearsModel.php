<?php
require_once __DIR__.'/../db.php';

function getYearsWithActors() {
    $conn = get_db_connection();
    $table = "screen_actor_guild_awards";

    $sql = "SELECT DISTINCT LEFT(year, 4) AS yearYear FROM $table";
    $result = $conn->query($sql);
    $years_with_actors = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $year = $row['yearYear'];
            $actors = [];

            $sql_actors = "SELECT id, full_name FROM $table WHERE LEFT(year, 4) = '$year' AND LENGTH(full_name) > 0";
            $result_actors = $conn->query($sql_actors);

            if ($result_actors->num_rows > 0) {
                while ($row_actor = $result_actors->fetch_assoc()) {
                    $actors[] = [
                        'id' => $row_actor['id'],
                        'full_name' => $row_actor['full_name']
                    ];
                }
            } else {
                $actors[] = ['id' => null, 'full_name' => 'Niciun actor găsit'];
            }

            $years_with_actors[] = [
                'year' => $year,
                'actors' => $actors
            ];
        }
    } else {
        echo "Nu s-au găsit rezultate pentru ani.";
    }

    return $years_with_actors;
}
?>
