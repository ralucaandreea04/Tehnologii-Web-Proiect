<?php
require_once __DIR__.'/../db.php';

function get_actor_data($actor_id) {
    $conn = get_db_connection();
    
    if ($actor_id) {
        $query = "SELECT full_name FROM screen_actor_guild_awards WHERE id = $actor_id";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $actor_name = $row['full_name'];
        } else {
            $actor_name = "Unknown";
        }

        $awards_query = "SELECT category, year, `show` FROM screen_actor_guild_awards WHERE full_name = '$actor_name'";
        $awards_result = $conn->query($awards_query);
    } else {
        $actor_name = "Unknown";
        $awards_result = null;
    }

    $conn->close();

    return [
        'actor_name' => $actor_name,
        'awards_result' => $awards_result
    ];
}

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
?>
