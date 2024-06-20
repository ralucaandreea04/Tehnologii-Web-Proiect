<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/AcVis~proiect/public/css/cssWinners.css">
    <link rel="icon" href="/AcVis~proiect/public/images/icon.png" type="image/x-icon">
    <title>Winners of 2020</title>
</head>
<body>
    <nav>
        <a href="/AcVis~proiect/public/">Back</a>
    </nav>
    <header>
        <h1>Winners of 2020</h1>
    </header>
    <div class="main-content">
        <section>
            <?php
            require_once __DIR__.'/../controller/winnersController.php';
            $winners = show_winners_of_2020();
            foreach ($winners as $winner) {
                echo "<p>$winner</p>";
            }
            ?>
        </section>
        <div class="right-section">
            <div class="gif-container">
                <img src="/AcVis~proiect/public/images/award.gif" alt="Example GIF" class="gif-image">
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; Bocăneț Raluca-Andreea & Cîrjonțu Ionela-Elena-Daniela</p>
    </footer>
</body>
</html>
