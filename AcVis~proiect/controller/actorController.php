<?php

require_once __DIR__.'/../model/actorModel.php'; 
function show_actor_info() {
    if (isset($_GET['id'])) {
        $actor_id = $_GET['id'];
        $actor_name = get_actor_name($actor_id); 
        $awards = get_actor_awards($actor_name);
        return [
            'actor_name' => $actor_name,
            'awards' => $awards
        ];
    } else {
        return [
            'actor_name' => "Unknown",
            'awards' => []
        ];
    }
}

$actor_info = show_actor_info();
$actor_name = $actor_info['actor_name'];
$awards = $actor_info['awards'];
require __DIR__.'/../view/actorView.php';
?>
