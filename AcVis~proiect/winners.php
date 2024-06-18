<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="icon.png" type="image/x-icon">
        <title>ASV</title>
        <link rel="stylesheet" href="cssAboutPage.css">
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
                 $servername = "localhost";
                 $username = "root";
                 $password = "123321445";
                 $dbname = "tw";
                 $table = "screen_actor_guild_awards";
                 $port = 3306;
                
                $conn = new mysqli($servername, $username, $password, $dbname, $port);
                if ($conn->connect_error) {
                    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
                }
                
                $sql = "SELECT category, full_name, `show` FROM $table WHERE LEFT(year, 4) = '2020' AND won = 'True'";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $category = $row['category'];
                        $actor = $row['full_name'];
                        $show = $row['show'];
                
                        echo '<p>The winner of the category ' . $category . '</strong>';
                        if (!empty($actor)) {
                            echo ' is ' . $actor;
                        } else {
                            echo ' is ' . $show;
                        }
                        echo '.</p>';
                    }
                } else {
                    echo '<p>Nu s-au găsit câștigători pentru anul 2020.</p>';
                }
                $conn->close();
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