<?php
require_once 'model/paginaPrincipalaModel.php';
require_once '../app/router.php';
function actor_view() {
    $actor_id = isset($_GET['id']) ? $_GET['id'] : null;
    $data = get_actor_data($actor_id);
    require 'view/paginaPrincipalaView.php';
}

actor_view();
?>
