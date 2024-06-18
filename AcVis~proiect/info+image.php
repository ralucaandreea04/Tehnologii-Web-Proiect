<?php
function getFirstSentencesFromWikipedia($actor_name_lower) {
    $url = 'https://en.wikipedia.org/w/api.php?action=query&format=json&prop=extracts&exintro&explaintext&redirects=1&titles=' . urlencode($actor_name_lower);

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
        if (isset($data['query']['pages'])) {
            $pages = $data['query']['pages'];
            $page = reset($pages); 
            
            if (isset($page['extract'])) {
                $biography = $page['extract'];
                // Split into sentences using regex
                $sentences = preg_split('/(?<=[.?!])\s+(?=[a-zA-Z])/',$biography);
                $firstSentences = implode(' ', array_slice($sentences, 0, 5));
                return $firstSentences;
            } else {
                return 'Biography not found on Wikipedia.';
            }
        } else {
            return 'No valid page found for this actor on Wikipedia.';
        }
    } else {
        return 'Error fetching data from Wikipedia: Status code ' . $httpCode;
    }
    curl_close($c);
}
$firstSentences = getFirstSentencesFromWikipedia($actor_name_lower);
echo '<p>' . $firstSentences . '</p>';
?>
