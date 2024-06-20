<?php
// winnersController.php

require_once __DIR__.'/../model/winnersModel.php'; // Include modelul pentru a accesa funcțiile definite

// Funcția care va manipula afișarea câștigătorilor din 2020 în view
function show_winners_of_2020_controller() {
    $winners = get_winners_of_2020(); // Apelează funcția din model pentru a obține câștigătorii

    // Întoarce câștigătorii pentru a fi afișați în view
    return $winners;
}

// Afișează câștigătorii în view (acest cod poate fi inclus într-un alt fișier care folosește funcția de mai sus)
$winners_list = show_winners_of_2020_controller();
foreach ($winners_list as $winner) {
    echo "<p>$winner</p>";
}
?>
