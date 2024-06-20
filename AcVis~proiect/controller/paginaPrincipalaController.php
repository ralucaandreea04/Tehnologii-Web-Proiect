<?php
require_once __DIR__.'/../model/paginaPrincipalaModel.php';

function paginaPrincipala_view() {
    $actor_id = isset($_GET['id']) ? $_GET['id'] : null;
    $data = get_actor_data($actor_id);
    
    $actor_name_lower = ucwords(strtolower($data['actor_name']));
    $firstSentences = getFirstSentencesFromWikipedia($actor_name_lower);
    
    $data['first_sentences'] = $firstSentences;
    $last_searched_names = get_last_searched_names();
    require __DIR__.'/../view/paginaPrincipalaView.php';
}


?>
