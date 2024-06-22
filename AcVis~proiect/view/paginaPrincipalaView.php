<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/AcVis~proiect/public/css/cssPaginaPrincipala.css">
    <link rel="icon" href="/AcVis~proiect/public/images/icon.png" type="image/x-icon">
    <title>ASV</title>
    </head>
<body>
    <nav>
        <header>
            <h1>Screen Actors Guild Awards</h1>
        </header>
        <a href="/AcVis~proiect/public/">Home</a>
        <a href="/AcVis~proiect/public/login">Login</a>
        <a href="/AcVis~proiect/public/about">About</a>
        <div class="search-container">
            <form method="post" action="/AcVis~proiect/public/search">
                <input type="text" name="search" class="search-input" placeholder="Search your favorite actor...">
                <button type="submit">Search</button>
            </form>
        </div>
    </nav>
    <section class="container">
        <h3>Gallery Photo</h3>
        <div class="slider-wrapper">
            <div class="slider">
                <img id="slide-1" src="/AcVis~proiect/public/images/castigatori.jpg" alt="castigatori">
                <img id="slide-2" src="/AcVis~proiect/public/images/castigatori2.jpg" alt="castigatori2">
                <img id="slide-3" src="/AcVis~proiect/public/images/castigarori3.jpg" alt="castigarori3">
                <img id="slide-4" src="/AcVis~proiect/public/images/castigarori4.jpg" alt="castigarori4">
            </div>
            <div class="slider-nav">
                <a href="#slide-1"></a>
                <a href="#slide-2"></a>
                <a href="#slide-3"></a>
                <a href="#slide-4"></a>
            </div>
        </div>
    </section>

    <section class="last-searched-people">
        <h2>The Last Searched People</h2>
        <div class="image-container">
            <?php
            $last_searched_names = get_last_searched_names();
            foreach ($last_searched_names as $name) {
                $image_src = '/AcVis~proiect/view/data/imageGenerator.php?actor_name=' . urlencode($name);
                echo '<img src="' . $image_src . '" alt="' . htmlspecialchars($name) . '">';
            }
            ?>
        </div>
    </section>


    <input type="checkbox" id="menu" name="menu" class="menu-checkbox">
    <div class="menu">
        <label class="menu-toggle" for="menu"><span>Toggle</span></label>
        <ul>
        <li><a href="/AcVis~proiect/public/winners" id="winners-link">Winners of 2020</a></li>
        <li><a href="/AcVis~proiect/public/all" id="all-actors">See All Actors</a></li>
            <li>
                <label for="menu-year">Search by year</label>
                <input type="checkbox" id="menu-year" name="menu-year" class="menu-checkbox">
                <div class="menu">
                    <label class="menu-toggle" for="menu-year">Toggle<span></span></label>
                    <ul>
                        <?php include __DIR__.'/../view/yearsView.php'; ?>
                    </ul>
                </div>
            </li>
            <li>
                <label for="menu-category">Search by category</label>
                <input type="checkbox" id="menu-category" name="menu-category" class="menu-checkbox">
                <div class="menu">
                    <label class="menu-toggle" for="menu-category">Toggle<span></span></label>
                    <ul>
                        <?php include __DIR__.'/../view/categoriesView.php'; ?>
                    </ul>
                </div>
            </li>
        </ul>
    </div>

    <footer>
        <p>&copy; Bocanet Raluca-Andreea & Cirjontu Ionela-Elena-Daniela</p>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const winnersLink = document.getElementById('winners-link');
            const mainContent = document.querySelector('.main-content');
            function showWinners() {
                const winnersURL = '/AcVis~proiect/public/winners';
                fetch(winnersURL)
                    .then(response => response.text())
                    .catch(error => {
                        console.error('Error fetching winners:', error);
                    });
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
            const actorLink = document.getElementById('all-actors');
            const mainContent = document.querySelector('.main-content');
            function showActor() {
                const actorURL = '/AcVis~proiect/public/all';
                fetch(actorURL)
                    .then(response => response.text())
                    .catch(error => {
                        console.error('Error fetching actors:', error);
                    });
            }
        });
    </script>
</body>
</html>
