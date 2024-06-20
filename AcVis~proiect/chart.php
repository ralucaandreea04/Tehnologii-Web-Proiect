<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafic folosind Chart.js și PHP - Radar</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Grafic folosind Chart.js și PHP - Radar</h1>
        <div style="width: 80%; margin: auto;">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <?php
    // Parametrii de conexiune la baza de date
    $servername = "localhost";
    $username = "root";
    $password = "Raluca.andreea123";
    $dbname = "tehnologii_web";
    $table = "screen_actor_guild_awards";

    // Creează conexiunea
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifică conexiunea
    if ($conn->connect_error) {
        die("Conexiune eșuată: " . $conn->connect_error);
    }

    // Interogare pentru a extrage anii (primele 4 caractere) și numărul de nominalizări pe categorie
    $sql = "SELECT LEFT(year, 4) AS year, COUNT(*) AS num_nominations FROM $table GROUP BY LEFT(year, 4)";
    $result = $conn->query($sql);

    // Inițializează array-urile pentru stocarea datelor
    $years = [];
    $data = [];

    // Verifică dacă s-au obținut rezultate
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $year = $row["year"];
            $num_nominations = (int)$row["num_nominations"];

            // Adaugă anul și numărul de nominalizări în array-urile respective
            $years[] = $year;
            $data[] = $num_nominations;
        }
    } else {
        echo "0 rezultate";
    }

    // Închide conexiunea la baza de date
    $conn->close();
    ?>

    <script>
        // Datele obținute din PHP
        var years = <?php echo json_encode($years); ?>;
        var data = <?php echo json_encode($data); ?>;

        // Crearea graficului folosind Chart.js
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'radar', // Tipul de grafic este Radar Chart
            data: {
                labels: years, // Etichetele pentru axe
                datasets: [{
                    label: 'Număr de nominalizări pe an',
                    data: data, // Datele pentru valorile de pe axa Y
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    r: {
                        beginAtZero: true, // Începe axa de la zero
                        title: {
                            display: true,
                            text: 'Număr de nominalizări' // Eticheta axei radar (R)
                        },
                        angleLines: {
                            display: true
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
