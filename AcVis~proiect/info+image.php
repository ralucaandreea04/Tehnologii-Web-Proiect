<?php

// Funcție pentru a obține primele trei propoziții din biografia unui actor de pe Wikipedia
function getFirstSentencesFromWikipedia($actorName) {
    $url = 'https://en.wikipedia.org/w/api.php?action=query&format=json&prop=extracts&exintro&explaintext&redirects=1&titles=' . urlencode($actorName);

    $c = curl_init($url);

    $opt = [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CONNECTTIMEOUT => 10,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_FAILONERROR => true,
        CURLOPT_FOLLOWLOCATION => true
    ];

    curl_setopt_array($c, $opt);
    $response = curl_exec($c);
    $httpCode = curl_getinfo($c, CURLINFO_RESPONSE_CODE);

    if ($httpCode == 200) {
        $data = json_decode($response, true);

        // Parsează răspunsul JSON pentru a obține biografia
        $pages = $data['query']['pages'];
        $page = reset($pages); // Obține primul element din array-ul de pagini

        if (isset($page['extract'])) {
            // Obține textul biografiei
            $biography = $page['extract'];

            // Impartim biografia in propozitii
            $sentences = preg_split('/(?<=[.?!])\s+(?=[a-zA-Z])/',$biography);
            
            // Construim un string cu primele trei propozitii
            $firstSentences = implode(' ', array_slice($sentences, 0, 5));

            return $firstSentences; // Returnează primele trei propoziții
        } else {
            return 'Biography not found on Wikipedia.';
        }
    } else {
        return 'Error fetching data from Wikipedia: Status code ' . $httpCode;
    }

    curl_close($c);
}

$actorName = 'Margot Robbie';
$firstSentences = getFirstSentencesFromWikipedia($actorName);

echo '<p>' . $firstSentences . '</p>';

?>
