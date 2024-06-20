<?php
require_once __DIR__.'/../model/searchModel.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchQuery = $_POST['search'];
    echo $searchQuery;

    $actor = searchActor($searchQuery);

    if ($actor) {
        $actorId = $actor["id"];
        header("Location:/Tehnologii-Web-Proiect%20-%20Copy%20/AcVis~proiect/public/actor?id=$actorId");
        exit;
    } else {
        echo "Niciun actor găsit";
    }
}
?>
