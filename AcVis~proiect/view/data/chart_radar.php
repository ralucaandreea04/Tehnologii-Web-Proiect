<?php

function generateRadarChart() {
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

    $sql = "SELECT LEFT(year, 4) AS year, COUNT(*) AS num_nominations FROM $table GROUP BY LEFT(year, 4)";
    $result = $conn->query($sql);

    $years = [];
    $data = [];

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $years[] = $row["year"];
            $data[] = (int)$row["num_nominations"];
        }
    } else {
        return [
            'labels' => json_encode([]),
            'data' => json_encode([]),
            'chart_js' => "// 0 rezultate"
        ];
    }

    $conn->close();

    $years = json_encode($years);
    $data = json_encode($data);

    $chartJS = <<<JS
        <script>
            var labels = $years;
            var data = $data;

            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'radar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Number of nominations per year',
                        data: data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        r: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Number of nominations'
                            },
                            angleLines: {
                                display: true
                            }
                        }
                    }
                }
            });
        </script>
    JS;
    
    return [
        'labels' => $years,
        'data' => $data,
        'chart_js' => $chartJS
    ];
}
?>
