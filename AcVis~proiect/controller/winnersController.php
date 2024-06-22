<?php
require_once __DIR__.'/../model/winnersModel.php';

function show_winners_list() {
    $winners = get_winners_of_2020(); 
    return $winners;
}
?>
