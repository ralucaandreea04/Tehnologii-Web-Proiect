<?php
require_once __DIR__.'/../db.php';

function searchActor($searchQuery) {
    $conn = get_db_connection();
    $table = "screen_actor_guild_awards";
    $ct=0;
    $exists = "SELECT * FROM $table WHERE full_name ='$searchQuery'";
    $result_exists = $conn->query($exists);
    foreach($result_exists as $row) {
        $ct++;
    }
    if($ct>0) {  
        $count = "SELECT COUNT(*) as count FROM last_searched";
        $result_count = $conn->query($count);
        $row_count = $result_count->fetch_assoc();
        
        if($row_count['count'] < 3) {
            $next_id_query = "SELECT IFNULL(MAX(id), 0) + 1 as next_id FROM last_searched";
            $result_next_id = $conn->query($next_id_query);
            $row_next_id = $result_next_id->fetch_assoc();
            $next_id = $row_next_id['next_id'];
            
            $insert = "INSERT INTO last_searched (id, name) VALUES ($next_id, '$searchQuery')";
            $conn->query($insert);
        } else {
            $select_name2 = "SELECT name FROM last_searched WHERE id = 2";
            $select_name3 = "SELECT name FROM last_searched WHERE id = 3";
            
            $result_name2 = $conn->query($select_name2);
            $result_name3 = $conn->query($select_name3);
            
            $row2 = $result_name2->fetch_assoc();
            $row3 = $result_name3->fetch_assoc();
            
            $name2 = $row2['name'];
            $name3 = $row3['name'];

            $update_name1 = "UPDATE last_searched SET name = '$name2' WHERE id = 1";
            $update_name2 = "UPDATE last_searched SET name = '$name3' WHERE id = 2";
            $update = "UPDATE last_searched SET name = '$searchQuery' WHERE id = 3";
            
            $conn->query($update_name1);
            $conn->query($update_name2);
            $conn->query($update);
        }
    }

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
