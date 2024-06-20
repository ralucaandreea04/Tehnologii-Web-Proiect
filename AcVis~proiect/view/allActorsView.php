<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/AcVis~proiect/public/images/icon.png" type="image/x-icon">
    <title>All Actors</title>
    <link rel="stylesheet" href="/AcVis~proiect/public/css/cssAllActors.css">
</head>

<body>
    <nav>
        <div class="logo">
            <a href="proiectWEB.html">All Screen Actors Guild Awards Nominees</a>
        </div>
        <div class="nav-links">
            <a href="/AcVis~proiect/public/">Home</a>
        </div>
    </nav>
    <section class="container">
        <h3 class="year-heading">Nominees</h3>
        <?php
        foreach ($actors_by_year as $year => $actors) {
            echo '<h3 class="year-heading">' . $year . '</h3>';
            if ($year < 1994) {
                echo '<ul class="actor-list actor-list-single-column">';
            } else {
                echo '<ul class="actor-list actor-list-multiple-columns">';
            }
            foreach ($actors as $actor) {
                echo '<li><a href="/AcVis~proiect/public/allActors?id=' . $actor['id'] . '">' . $actor['name'] . '</a></li>';
            }
            echo '</ul>';
        }
        ?>
    </section>
    <footer>
        <p>&copy; Bocanet Raluca-Andreea & Cirjontu Ionela-Elena-Daniela</p>
    </footer>
</body>

</html>