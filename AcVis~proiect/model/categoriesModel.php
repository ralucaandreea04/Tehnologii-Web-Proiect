<?php
 require_once __DIR__.'/../db.php';

function getCategoriesWithActors() {
    $conn = get_db_connection();
    $table = "screen_actor_guild_awards";

    $sql = "SELECT DISTINCT category FROM $table";
    $result = $conn->query($sql);
    $categories_with_actors = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $category = $row['category'];
            $actors = [];

            $sql_actors = "SELECT id, full_name FROM $table WHERE category = '$category' AND LENGTH(full_name) > 0";
            $result_actors = $conn->query($sql_actors);

            if ($result_actors->num_rows > 0) {
                while ($row_actor = $result_actors->fetch_assoc()) {
                    $actor_id = $row_actor['id'];
                    $actor_name = $row_actor['full_name'];
                    $actors[] = [
                        'id' => $actor_id,
                        'name' => $actor_name
                    ];
                }
            } else {
                $actors[] = ['id' => null, 'name' => 'No actors found'];
            }

            $categories_with_actors[] = [
                'category' => $category,
                'actors' => $actors
            ];
        }
    } else {
        $categories_with_actors[] = ['category' => null, 'actors' => [['id' => null, 'name' => 'No data found']]];
    }

    return $categories_with_actors;
}
?>
