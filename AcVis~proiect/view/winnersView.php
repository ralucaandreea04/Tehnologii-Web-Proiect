<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon.png" type="image/x-icon">
    <title>Winners of 2020</title>
    <style>
      body {
    font-family: Bookman Old Style;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    overflow-x: hidden;
}

header {
    color: #D4AF37;
    position: relative;
    text-align: center;
}

.main-content {
    display: flex;
    justify-content: space-between;
    width: 100%;
    padding: 20px;
}

section {
    padding: 20px;
    text-align: center;
    width: 55%;
    margin-left: 5%;
}

.right-section {
    width: 45%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.gif-container {
    text-align: center;
    width: 100%;
}

.gif-image {
    max-width: 100%;
    height: auto;
}

nav {
    background-color: #ffffff;
    padding: 15px;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    width: 100%;
}

nav a {
    color: #6b5c04;
    text-decoration: none;
    margin: 0 15px;
}

footer {
    background-color: #ffffff;
    color: #000000;
    padding: 10px 0;
    text-align: center;
    width: 100%;
    z-index: 1000;
}

footer p {
    margin: 0;
}

h3 {
    color: #000000;
}  
    </style>
</head>
<body>
    <nav>
        <a href="proiectWEB.php">Back</a>
    </nav>
    <header>
        <h1>Winners of 2020</h1>
    </header>
    <div class="main-content">
        <section>
            <?php
            require_once __DIR__.'/../controller/winnersController.php'; // Include controllerul pentru a accesa funcțiile definite

            $winners = show_winners_of_2020(); // Apelează funcția din controller pentru a obține câștigătorii

            foreach ($winners as $winner) {
                echo "<p>$winner</p>";
            }
            ?>
        </section>
        <div class="right-section">
            <div class="gif-container">
                <img src="award.gif" alt="Example GIF" class="gif-image">
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; Bocăneț Raluca-Andreea & Cîrjonțu Ionela-Elena-Daniela</p>
    </footer>
</body>
</html>
