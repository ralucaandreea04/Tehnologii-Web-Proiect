<?php
function generateChartBar($actor_name) {
    $servername = "localhost";
    $username = "root";
    $password = "Raluca.andreea123";
    $dbname = "tehnologii_web";
    $port = 3306;
    $table = "screen_actor_guild_awards";
    $conn = new mysqli($servername, $username, $password, $dbname, $port);
    if ($conn->connect_error) {
        die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
    }

    $sql = "SELECT year, COUNT(*) AS numar_nominalizari FROM $table WHERE full_name = '$actor_name' GROUP BY year";
    $result = $conn->query($sql);

    $labels = [];
    $data = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $labels[] = $row['year'];
            $data[] = $row['numar_nominalizari'];
        }
    } else {
        echo "Nu au fost găsite înregistrări.";
    }

    $conn->close();

    return [
        'labels' => $labels,
        'data' => $data,
        'chart_js' => "
            <script>
                var labels = " . json_encode($labels) . ";
                var data = " . json_encode($data) . ";

                var ctx = document.getElementById('myChartBar').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Number of nominations for $actor_name',
                            data: data,
                            backgroundColor: '#4CAF50',
                            borderColor: '#4CAF50',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                stepSize: 1
                            }
                        }
                    }
                });
            </script>
        "
    ];
}
?>