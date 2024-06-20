<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/cssActor.css">
    <title>List of Categories</title>
</head>
<body>
    <div class="main-content">
        <section>
            <?php
            require_once __DIR__.'/../model/categoriesModel.php';

            $categories_with_actors = getCategoriesWithActors();

            echo '<ul class="submenu">';
            foreach ($categories_with_actors as $category) {
                echo '<li>';
                echo '<label for="submenu' . $category['category'] . '">' . $category['category'] . '</label>';
                echo '<input type="checkbox" id="submenu' . $category['category'] . '" class="menu-checkbox">';
                echo '<div class="menu">';
                echo '<label class="menu-toggle" for="submenu' . $category['category'] . '"></label>';
                echo '<ul class="submenu">';

                foreach ($category['actors'] as $actor) {
                    echo '<li><a href="actor.php?id=' . $actor['id'] . '">' . $actor['name'] . '</a></li>';
                }

                echo '</ul>';
                echo '</div>';
                echo '</li>';
            }
            echo '</ul>';
            ?>
        </section>
    </div>
</body>
</html>
