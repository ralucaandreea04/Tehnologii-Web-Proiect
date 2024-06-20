<?php

require_once __DIR__.'/../model/winnersModel.php'; // Include modelul pentru a accesa funcțiile definite

function show_winners_of_2020() {
    $winners = get_winners_of_2020(); // Apelează funcția din model pentru a obține câștigătorii

    return $winners;
}

include __DIR__.'/../view/winnersView.php';

?>
