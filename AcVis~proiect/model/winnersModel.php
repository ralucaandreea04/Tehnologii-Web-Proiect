<?php
require_once __DIR__.'/../db.php';

function get_winners_of_2020() {
    $conn = get_db_connection(); 
    $table = "screen_actor_guild_awards"; 

    $sql = "SELECT category, full_name, `show` FROM $table WHERE LEFT(year, 4) = '2020' AND won = 'True'";
    $result = $conn->query($sql);
    $winners = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $category = $row['category'];
            $actor = $row['full_name'];
            $show = $row['show'];

            $winner_message = "The winner of the category $category";
            if (!empty($actor)) {
                $winner_message .= " is $actor.";
            } else {
                $winner_message .= " is $show.";
            }

            $winners[] = $winner_message; 
        }
    } else {
        $winners[] = "Nu s-au găsit câștigători pentru anul 2020.";
    }

    $conn->close();
    return $winners; 
}
include __DIR__.'/../view/winnersView.php';
?>
