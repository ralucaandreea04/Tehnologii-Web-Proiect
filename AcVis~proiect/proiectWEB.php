<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="icon.png" type="image/x-icon">
        <title>ASV</title>
        <link rel="stylesheet" type="text/css" href="cssPaginaPrincipala.css">
    </head>

    <body>
        <nav>
            <header>
                <h1>Screen Actors Guild Awards</h1>
            </header>
            <a href="proiectWEB.html">Home</a>
            <a href="loginWEB.html">Login</a>
            <a href="aboutWEB.html">About</a>
            <div class="search-container">
                <form method="post" action="search.php">
                    <input type="text" name="search" class="search-input" placeholder="Search your favorite actor...">
                    <button type="submit">Search</button>
                </form>
            </div>
        </nav>
        <section class="container">
            <h3>Gallery Photo</h3>
            <div class="slider-wrapper">
                <div class="slider">
                    <img id="slide-1" src="castigatori.jpg" alt="castigatori">
                    <img id="slide-2" src="castigatori2.jpg" alt="castigatori2">
                    <img id="slide-3" src="castigarori3.jpg" alt="castigarori3">
                    <img id="slide-4" src="castigarori4.jpg" alt="castigarori4">
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
                <a href="actor.html"><img src="margot.png" alt="Person 1"></a>
                <a href="#"><img src="castigarori4.jpg"
                        alt="Person 2"></a>
                <a href="#"><img src="castigarori3.jpg"
                        alt="Person 3"></a>
            </div>
        </section>
        <input type="checkbox" id="menu" name="menu" class="menu-checkbox">
        <div class="menu">
            <label class="menu-toggle" for="menu"><span>Toggle</span></label>
            <ul>
                <li>
                    <a href="winners.php">Winners of 2020</a>
                </li>
                <li>
                    <a href="#">All</a>
                </li>
                <li>
                    <label for="menu-year">Search by year</label>
                    <input type="checkbox" id="menu-year" name="menu-year"
                        class="menu-checkbox">
                    <div class="menu">
                        <label class="menu-toggle"
                            for="menu-year">Toggle<span></span></label>
                        <ul>
                            <?php include 'years.php'; ?>
                        </ul>
                    </div>
                </li>
                <li>
                    <label for="menu-category">Search by category</label>
                    <input type="checkbox" id="menu-category"
                        name="menu-category" class="menu-checkbox">
                    <div class="menu">
                        <label class="menu-toggle"
                            for="menu-category">Toggle<span></span></label>
                        <ul>
                            <?php include 'categories.php'; ?>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <footer>
            <p>&copy; Bocanet Raluca-Andreea & Cirjontu Ionela-Elena-Daniela</p>
        </footer>
    </body>
</html>