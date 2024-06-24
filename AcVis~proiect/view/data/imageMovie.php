<?php
define('API_KEY', '7c12d7e0b5fcb20bf6adaf6cc72e6224');

function searchMovieAndGetPoster($movie_name) {
    $url = 'https://api.themoviedb.org/3/search/movie?api_key=' . API_KEY . '&query=' . urlencode($movie_name);

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
        curl_close($c);

        if (!empty($data['results'])) {
            $movie = $data['results'][0]; 

            if (isset($movie['poster_path'])) {
                $imageUrl = 'https://image.tmdb.org/t/p/w500' . $movie['poster_path'];
                return $imageUrl;
            } else {
                return '';
            }
        } else {
            return ''; 
        }
    } else {
        curl_close($c);
        return ''; 
    }
}
?>
