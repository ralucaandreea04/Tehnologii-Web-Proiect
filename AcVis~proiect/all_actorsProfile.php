<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon.png" type="image/x-icon">
    <title>ASV</title>
    <link rel="stylesheet" href="cssActor.css">
</head>

<body>
    <nav>
        <a href="all_actors.php">Back</a>
    </nav>
    <div class="main-content">
        <section>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "123321445";
            $dbname = "tw";
            $table = "screen_actor_guild_awards";
            $port = 3306;

            if (isset($_GET['id'])) {
                $actor_id = $_GET['id'];
                $conn = new mysqli($servername, $username, $password, $dbname, $port);

                if ($conn->connect_error) {
                    die("Conectare eșuată: " . $conn->connect_error);
                }

                $query = "SELECT full_name FROM $table WHERE id = $actor_id";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $actor_name = $row['full_name'];
                } else {
                    $actor_name = "Unknown";
                }
                $awards_query = "SELECT category, year,`show` FROM $table WHERE full_name = '$actor_name'";
                $awards_result = $conn->query($awards_query);

                $conn->close();
            } else {
                $actor_name = "Unknown";
            }
            ?>
            <h1><?php echo $actor_name; ?></h1>
            <?php
                $actor_name_lower = ucwords(strtolower($actor_name));
                include 'info+image.php' 
            ?>
            <div class="nomination-heading">Nominations at SAG Awards:</div>
            <ul class="nomination-list">
                <?php
                if ($awards_result->num_rows > 0) {
                    while ($award_row = $awards_result->fetch_assoc()) {
                        echo "<li>Outstanding Performance by a " . $award_row['category'] . " for \"" . $award_row['show'] . "\" (" . $award_row['year'] . ")</li>";
                    }
                } else {
                    echo "<li>No awards found.</li>";
                }
                ?>
            </ul>
            <div class="news-box">
                <h2 class="news-title">Breaking News</h2>
                <p class="news-content">News about <?php echo $actor_name; ?>, her latest projects and her personal life.</p>
                <a href="https://people.com/tag/<?php echo $actor_name; ?>/" class="read-more" target="_blank">Read more</a>
            </div>
        </section>
        <div class="right-section">
            <div class="image-container">
                <img src="imageGenerator.php?actor_name=<?php echo urlencode($actor_name); ?>" alt="Profile Image" style="max-height: 500px; max-width: 300px;">
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
</body>
</html>
