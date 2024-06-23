<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/AcVis~proiect/public/images/icon.png" type="image/x-icon">
    <title>All Actors</title>
    <link rel="stylesheet" type="text/css" href="/AcVis~proiect/public/css/cssAllActors.css">
</head>

<body>
    <nav>
        <a href="/AcVis~proiect/public/">BACK</a>
    </nav>
    <section class="container">
        <h3 class="year-heading">All Screen Actors Guild Awards Nominees</h3>
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
        <p>&copy; Bocăneț Raluca-Andreea & Cîrjonțu Ionela-Elena-Daniela</p>
    </footer>
</body>

</html>
