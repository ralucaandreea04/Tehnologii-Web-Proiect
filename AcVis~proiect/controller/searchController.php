<?php
require_once __DIR__.'/../model/searchModel.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchQuery = $_POST['search'];

    $actor = searchActor($searchQuery);

    if ($actor) {
        $actorId = $actor["id"];
        header("Location: /AcVis~proiect/public/actor?id=$actorId");
        exit;
    } else {
        include __DIR__.'/../view/actorNotFound.php';
    }
}
?>
