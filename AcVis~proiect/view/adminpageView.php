<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/AcVis~proiect/public/images/icon.png" type="image/x-icon">
  <title>SAG Awards | Profile</title>
  <link rel="stylesheet" href="/AcVis~proiect/public/css/cssAdminPage.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/canvas2svg"></script>
  <style>
    #myChart {
      width: 650px;
      height: 500px;
    }
    </style>
</head>
<body>
    <?php  
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
      header("Location: loginWEB.html");
      exit;
    }
  
    $servername = "localhost";
    $username = "root";
    $password = "Raluca.andreea123";
    $dbname = "tehnologii_web";
    $table = "screen_actor_guild_awards";
    $port = 3306;
  
    $conn = new mysqli($servername, $username, $password, $dbname, $port);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    ?>
<div class="admin-menu">
    Admin: <?php echo htmlspecialchars($_SESSION['name']); ?>
    <form action="/AcVis~proiect/public/logout" method="post" style="display: inline;">
      <button type="submit" class="logout-button">LOGOUT</button>
    </form>
  </div>

  <div class="form-action-container">
    <div class="form-container">
      <div id="add-form">
        <h2>Add New Record</h2>
        <form action="/AcVis~proiect/public/adminpage" method="POST">
        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" id="id" name="id" required>
          </div>
          <div class="form-group">
            <label for="year">Year:</label>
            <input type="text" id="year" name="year" required>
          </div>
          <div class="form-group">
            <label for="category">Category:</label>
            <input type="text" id="category" name="category" required>
          </div>
          <div class="form-group">
            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name">
          </div>
          <div class="form-group">
            <label for="show">Show:</label>
            <input type="text" id="show" name="show" required>
          </div>
          <div class="form-group">
            <label for="won">Won:</label>
            <input type="text" id="won" name="won" required>
          </div>
          <button type="submit" name="add_record" class="btn">Add Record</button>
        </form>
        <?php if ($messages['add_record']) echo "<p class='notification' id='deleteFormMessage'>{$messages['add_record']}</p>"; ?>
      </div>

      <div id="delete-form">
        <h2>Delete Record</h2>
        <form action="/AcVis~proiect/public/adminpage" method="POST">
          <div class="form-group">
            <label for="delete_id">Record ID:</label>
            <input type="text" id="delete_id" name="delete_id" required>
          </div>
          <button type="submit" name="delete_record" class="btn">Delete Record</button>
        </form>
        <?php if ($messages['delete_record']) echo "<p class='notification' id='deleteFormMessage'>{$messages['delete_record']}</p>"; ?>
      </div>

      <div id="change-password">
        <h2>Change Password</h2>
        <form action="/AcVis~proiect/public/adminpage" method="POST">
          <div class="form-group">
            <label for="current_password">Current Password:</label>
            <input type="password" id="current_password" name="current_password" required>
          </div>
          <div class="form-group">
            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" required>
          </div>
          <div class="form-group">
            <label for="confirm_password">Confirm New Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
          </div>
          <button type="submit" name="change_password" class="btn">Change Password</button>
        </form>
        <?php if ($messages['change_password']) echo "<p class='notification' id='changePasswordMessage'>{$messages['change_password']}</p>"; ?>
      </div>
    </div>

    <div class="custom-container">
      <h2>Records Table</h2>
      <div class="custom-content">
        <div class="table-wrapper">
          <table class="data-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Year</th>
                <th>Category</th>
                <th>Full Name</th>
                <th>Show</th>
                <th>Won</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $conn = new mysqli($servername, $username, $password, $dbname, $port);
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }
              $sql_select = "SELECT * FROM `$table`";
              $result = $conn->query($sql_select);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                  echo "<td>" . htmlspecialchars($row["year"]) . "</td>";
                  echo "<td>" . htmlspecialchars($row["category"]) . "</td>";
                  echo "<td>" . htmlspecialchars($row["full_name"]) . "</td>";
                  echo "<td>" . htmlspecialchars($row["show"]) . "</td>";
                  echo "<td>" . htmlspecialchars($row["won"]) . "</td>";
                  echo "</tr>";
                }
              } else {
                echo "<tr><td colspan='6'>No records found</td></tr>";
              }
              $conn->close();
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="chart-container">
        <div class="chart">
            <canvas id="myChart"></canvas>
            <button id="exportCsvBtn">Export CSV</button>
            <button id="exportSvgBtn">Export SVG</button>
            <button id="exportWebPBtn">Export WebP</button>
            <?php
                include '../view/data/chart_radar.php';
                $chartData = generateRadarChart();
                echo $chartData['chart_js'];
            ?>
        </div>
    </div> 
  </div>
  <script>
    document.getElementById('exportCsvBtn').addEventListener('click', function() {
      var labels = <?php echo $chartData['labels']; ?>;
      var data = <?php echo $chartData['data']; ?>;
      var csvContent = "data:text/csv;charset=utf-8,Year,Num Nominations\n";

      labels.forEach(function(label, index) {
        csvContent += label + "," + data[index] + "\n";
      });

      var encodedUri = encodeURI(csvContent);
      var link = document.createElement('a');
      link.setAttribute('href', encodedUri);
      link.setAttribute('download', 'chart_data.csv');
      document.body.appendChild(link);

      link.click();
      document.body.removeChild(link);
    });
    document.getElementById('exportSvgBtn').addEventListener('click', function() {
            var canvas = document.getElementById('myChart');
            if (canvas) {
                try {
                    var svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
                    svg.setAttribute("width", canvas.width);
                    svg.setAttribute("height", canvas.height);

                    var image = new Image();
                    image.onload = function () {
                        var svgImage = document.createElementNS("http://www.w3.org/2000/svg", "image");
                        svgImage.setAttributeNS("http://www.w3.org/1999/xlink", "xlink:href", canvas.toDataURL());
                        svgImage.setAttribute("width", canvas.width);
                        svgImage.setAttribute("height", canvas.height);
                        svg.appendChild(svgImage);

                        var serializer = new XMLSerializer();
                        var svgString = serializer.serializeToString(svg);
                        var blob = new Blob([svgString], { type: "image/svg+xml;charset=utf-8" });
                        var link = document.createElement('a');
                        link.href = URL.createObjectURL(blob);
                        link.download = 'chart.svg';
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                    };
                    image.src = canvas.toDataURL();
                } catch (error) {
                    console.error('Error exporting chart:', error);
                }
            }
        });

        document.getElementById('exportWebPBtn').addEventListener('click', function() {
            var canvas = document.getElementById('myChart');
            if (canvas) {
                try {
                    var dataUrl = canvas.toDataURL('image/webp');
                    var link = document.createElement('a');
                    link.href = dataUrl;
                    link.download = 'chart.webp';
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                } catch (error) {
                    console.error('Error exporting chart:', error);
                }
            }
        });
    document.getElementById('addRecordForm').addEventListener('submit', function(event) {
            event.preventDefault();
            fetch('/AcVis~proiect/public/adminpage', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    add_record: true,
                    id: document.getElementById('id').value,
                    year: document.getElementById('year').value,
                    category: document.getElementById('category').value,
                    full_name: document.getElementById('full_name').value,
                    show: document.getElementById('show').value,
                    won: document.getElementById('won').value
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data.message);
            })
            .catch(error => {
                console.log('Error: ' + error.message);
            });
        });

        document.getElementById('deleteRecordForm').addEventListener('submit', function(event) {
            event.preventDefault();
            fetch('/AcVis~proiect/public/adminpage', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    delete_record: true,
                    delete_id: document.getElementById('delete_id').value
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data.message);
            })
            .catch(error => {
                console.log('Error: ' + error.message);
            });
        });

        document.getElementById('changePasswordForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const currentPassword = document.getElementById('current_password').value;
            const newPassword = document.getElementById('new_password').value;
            const confirmPassword = document.getElementById('confirm_password').value;

            if (newPassword !== confirmPassword) {
                console.log('New password and confirm password do not match.');
                return;
            }

            fetch('/AcVis~proiect/public/adminpage', {
                method:  'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    change_password: true,
                    current_password: currentPassword,
                    new_password: newPassword,
                    confirm_password: confirmPassword
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data.message);
            })
            .catch(error => {
                console.log('Error: ' + error.message);
            });
        });
    </script>
</body>
</html>

