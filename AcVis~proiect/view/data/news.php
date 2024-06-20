<?php
$apiKey = 'b7c2efe300bd417f9e76fd4e3086b42d';
$endpoint = 'https://newsapi.org/v2/everything';
$pageSize = 1;


$url = "$endpoint?q=$actor_name&pageSize=$pageSize&apiKey=$apiKey";

$options = [
    'http' => [
        'method' => 'GET',
        'header' => 'User-Agent: PHP'
    ]
];

$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);

if ($response === false) {
    die('Failed to fetch news: ' . error_get_last()['message']);
}

$newsData = json_decode($response, true);

if (!$newsData || !isset($newsData['articles']) || count($newsData['articles']) === 0) {
    die('No articles found.');
}

$newsArticle = $newsData['articles'][0];

$title = $newsArticle['title'];
$description = $newsArticle['description'];
?>