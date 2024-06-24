<?php
function generateChartCircle($actor_name) {
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

    // Define an array of colors
    $colors = ['#4CAF50', '#FFC107', '#2196F3', '#E91E63', '#9C27B0', '#FF5722', '#673AB7', '#3F51B5', '#FFEB3B', '#00BCD4', '#8BC34A', '#FF9800'];

    // Generate the chart JavaScript
    return [
        'labels' => $labels,
        'data' => $data,
        'chart_js' => "
            <script>
                var labels = " . json_encode($labels) . ";
                var data = " . json_encode($data) . ";

                var backgroundColors = " . json_encode($colors) . ";

                var ctx = document.getElementById('myChartCircle').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'doughnut', // Tipul diagramă circulară
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Număr nominalizări pentru $actor_name',
                            data: data,
                            backgroundColor: backgroundColors, // Culori pentru fiecare segment
                            borderColor: '#ffffff',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top', // Poziția legendei
                                maxLines: 2, // Numărul maxim de linii pentru legenda
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        return tooltipItem.label + ': ' + tooltipItem.raw.toFixed(2); 
                                    }
                                }
                            }
                        }
                    }
                });
            </script>
        "
    ];
}
?>
