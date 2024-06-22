<?php
require_once __DIR__ . '/data/imageMovie.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="/AcVis~proiect/public/images/icon.png" type="image/x-icon">
        <title>ASV</title>
        <link href="/AcVis~proiect/public/css/cssAboutPage.css" rel="stylesheet">
        <link href="/AcVis~proiect/public/css/cssShow.css" rel="stylesheet">
    </head>

    <body>
        <nav>
            <a href="/AcVis~proiect/public/">BACK</a>
        </nav>
        <div class="main-content">
            <section>
                <h1><?php echo $actor_name; ?></h1>
                <div class="nomination-heading">Nominations at SAG Awards:</div>
                <ul class="nomination-list" id="nomination-list">
                    <?php if (!empty($awards)): ?>
                        <?php foreach ($awards as $award): ?>
                            <li>Outstanding Performance by a <?php echo htmlspecialchars($award['category']); ?> (<?php echo htmlspecialchars($award['year']); ?>)</li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li>No awards found.</li>
                    <?php endif; ?>
                </ul>
                <div class="read-more" id="read-more">Read more</div>
            </section>
            <div class="right-section">
                <div class="gif-container">
                    <?php
                    $movieImageUrl = searchMovieAndGetPoster($actor_name);
                    if (!empty($movieImageUrl)): ?>
                        <img src="<?php echo htmlspecialchars($movieImageUrl); ?>" alt="Poster Film">
                    <?php else: ?>
                        <p>There is no picture.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <footer>
            <p>&copy; Bocăneț Raluca-Andreea & Cîrjonțu Ionela-Elena-Daniela</p>
        </footer>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const nominationList = document.getElementById('nomination-list');
                const readMoreButton = document.getElementById('read-more');

                if (nominationList.scrollHeight > nominationList.clientHeight) {
                    readMoreButton.style.display = 'block';
                }

                readMoreButton.addEventListener('click', function() {
                    nominationList.classList.toggle('show-more');
                    readMoreButton.textContent = nominationList.classList.contains('show-more') ? 'Show less' : 'Read more';
                });
            });
        </script>
    </body>
</html>
