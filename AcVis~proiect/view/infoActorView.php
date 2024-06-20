<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="public/images/icon.png" type="image/x-icon">
    <title>ASV</title>
    <link rel="stylesheet" href="public/css/cssActor.css">
</head>
<body>
    <?php include 'templates/header.php'; ?>
    <div class="main-content">
        <section>
            <h1><?php echo $data['actor_name']; ?></h1>
            <?php
                echo '<p>' . $data['first_sentences'] . '</p>';
            ?>
            <?php
                $actor_name_lower = ucwords(strtolower($data['actor_name']));
                include 'info+image.php';
            ?>
            <div class="nomination-heading">Nominations at SAG Awards:</div>
            <ul class="nomination-list">
                <?php
                if ($data['awards_result'] && $data['awards_result']->num_rows > 0) {
                    while ($award_row = $data['awards_result']->fetch_assoc()) {
                        echo "<li>Outstanding Performance by a " . $award_row['category'] . " for \"" . $award_row['show'] . "\" (" . $award_row['year'] . ")</li>";
                    }
                } else {
                    echo "<li>No awards found.</li>";
                }
                ?>
            </ul>
            <div class="news-box">
                <h2 class="news-title">Breaking News</h2>
                <p class="news-content">News about <?php echo $data['actor_name']; ?>, her latest projects and her personal life.</p>
                <a href="https://people.com/tag/<?php echo $data['actor_name']; ?>/" class="read-more" target="_blank">Read more</a>
            </div>
        </section>
        <div class="right-section">
            <div class="image-container">
                <img src="imageGenerator.php?actor_name=<?php echo urlencode($data['actor_name']); ?>" alt="Profile Image" style="max-height: 500px; max-width: 300px;">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="images">
          <img src="grafic1.png" alt="Imagine 1">
        </div>
        <div class="images">
          <img src="grafic2.png" alt="Imagine 2">
        </div>
        <div class="images">
          <img src="grafic3.png" alt="Imagine 3">
        </div>
    </div>
    <?php include 'templates/footer.php'; ?>
</body>
</html>
