<?php

require_once 'model/infoActorController.php';

function actor_view() {
    $actor_id = isset($_GET['id']) ? $_GET['id'] : null;
    $data = get_actor_data($actor_id);
    
    $actor_name_lower = ucwords(strtolower($data['actor_name']));
    $firstSentences = getFirstSentencesFromWikipedia($actor_name_lower);

    $data['first_sentences'] = $firstSentences;
    
    require 'view/paginaPrincipalaView.php';
}
?>
