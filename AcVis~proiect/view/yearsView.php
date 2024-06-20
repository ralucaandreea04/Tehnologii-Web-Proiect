<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
    include __DIR__.'/../model/yearsModel.php';
    $years_with_actors = getYearsWithActors();

    echo '<ul class="submenu">';
    foreach ($years_with_actors as $year_data) {
        $year = $year_data['year'];
        $actors = $year_data['actors'];

        echo '<li>';
        echo '<label for="submenu' . $year . '">' . $year . '</label>';
        echo '<input type="checkbox" id="submenu' . $year . '" class="menu-checkbox">';
        echo '<div class="menu">';
        echo '<ul class="submenu">';
        
        foreach ($actors as $actor) {
            $actor_id = $actor['id'];
            $actor_name = $actor['full_name'];
            echo '<li><a href="/AcVis~proiect/public/actor?id=' . $actor_id . '">' . $actor_name . '</a></li>';
        }

        echo '</ul>';
        echo '</div>';
        echo '</li>';
    }
    echo '</ul>';
    ?>
</body>
</html>
