<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon.png" type="image/x-icon">
    <title>All Actors</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: #333;
            color: #fff;
            padding: 10px 0; /* Ajustăm padding-ul pentru a centra butoanele pe orizontală */
            display: flex; /* Folosim flexbox pentru a alinia elementele */
            justify-content: space-between; /* Aliniem elementele la început și sfârșit */
            align-items: center; /* Aliniem vertical pe axa Y */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }

        .logo {
            margin-left: 10px; /* Ajustăm margin-left pentru a muta logo-ul mai în stânga */
        }

        .nav-links {
            display: flex; /* Utilizăm flexbox pentru alinierea butoanelor */
            justify-content: center; /* Aliniem butoanele pe orizontală în mijloc */
            align-items: center; /* Aliniem butoanele pe verticală în mijloc */
            flex-grow: 1; /* Împinge butoanele în stânga logo-ului */
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        .container {
            max-width: none; /* Eliminăm limitarea la o lățime maximă */
            margin: 100px auto; /* Ajustăm margin-top pentru a lăsa suficient spațiu sub bara de navigație */
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding-left: 20px; /* Adăugăm un spațiu între marginea stângă a containerului și text */
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .year-heading {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: center;
        }

        .actor-list {
            list-style: none;
            padding: 0;
            text-align: center;
        }
    
        .actor-list li {
            margin-bottom: 10px;
        }

        .actor-list a {
            color: #333;
            text-decoration: none;
            transition: color 0.3s ease;
            font-size: 16px; 
            font-weight: bold;
        }

        .actor-list a:hover {
            color: #007bff;
        }

        .actor-list-single-column {
            columns: 1;
            column-gap: 0;
        }

        .actor-list-multiple-columns {
            columns: 4;
            column-gap: 30px;
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
    </style>
</head>

<body>
    <nav>
        <div class="logo">
            <a href="proiectWEB.html">All Screen Actors Guild Awards Nominees</a>
        </div>
        <div class="nav-links">
            <a href="proiectWEB.html">Home</a>
            <a href="loginWEB.html">Login</a>
            <a href="aboutWEB.html">About</a>
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
                echo '<li><a href="all_actorsProfile.php?id=' . $actor['id'] . '">' . $actor['name'] . '</a></li>';
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