<?php
require_once __DIR__.'/../db.php';
require_once __DIR__.'/../model/allActorsModel.php';
$actors_by_year = getAllActors();

include __DIR__.'/../view/allActorsView.php';
?>
