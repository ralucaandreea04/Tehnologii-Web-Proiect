<?php

define('API_KEY', '2a0639b50adbbf71d00397aff3e8801d');
$query = 'Margot Robbie';
$url = 'https://api.themoviedb.org/3/search/person?api_key=' . API_KEY . '&query=' . urlencode($query);

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
    if (isset($data['results'][0]['profile_path'])) {
        $profilePath = $data['results'][0]['profile_path'];
        $imageUrl = 'https://image.tmdb.org/t/p/w500' . $profilePath;
        $c = curl_init($imageUrl);
        $opt = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_FAILONERROR => true,
            CURLOPT_FOLLOWLOCATION => true
        ];
        curl_setopt_array($c, $opt);
        $imageData = curl_exec($c);
        $imageHttpCode = curl_getinfo($c, CURLINFO_RESPONSE_CODE);
        $imageType = curl_getinfo($c, CURLINFO_CONTENT_TYPE);

        if ($imageHttpCode == 200 && strpos($imageType, 'image/') === 0) {
            header('Content-Type: ' . $imageType);
            echo $imageData;
        } else {
            http_response_code($imageHttpCode);
            header('Content-Type: text/plain');
            echo 'Status code: ' . $imageHttpCode;
        }
        curl_close($c);
    } else {
        http_response_code(500);
        header('Content-Type: text/plain');
        echo 'Profile image not found in response.';
    }
} else {
    http_response_code($httpCode);
    header('Content-Type: text/plain');
    echo 'Status code: ' . $httpCode;
}

curl_close($c);

?>