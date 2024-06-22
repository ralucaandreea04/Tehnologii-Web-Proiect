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
  session_start();

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

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_record'])) {
    $id = $_POST['id'];
    $year = $_POST['year'];
    $category = $_POST['category'];
    $full_name = $_POST['full_name'];
    $show = $_POST['show'];
    $won = $_POST['won'];

    $sql_insert = "INSERT INTO `$table` (id, year, category, full_name, `show`, won) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql_insert);
    $stmt->bind_param("ssssss", $id, $year, $category, $full_name, $show, $won);
    $stmt->execute();

    $stmt->close();
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_record'])) {
    $delete_id = $_POST['delete_id'];
    $sql_delete = "DELETE FROM `$table` WHERE id = ?";
    $stmt = $conn->prepare($sql_delete);
    $stmt->bind_param("s", $delete_id);
    $stmt->execute();

    $stmt->close();
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['change_password'])) {
      $current_password = $_POST['current_password'];
      $new_password = $_POST['new_password'];
      $confirm_password = $_POST['confirm_password'];
  
      if ($new_password !== $confirm_password) {
        echo "<script>alert('New password and confirm password do not match.');</script>";
      } else {
        $user_name = $_SESSION['name'];
  
        $sql_select = "SELECT password FROM utilizatori WHERE name = ?";
        $stmt = $conn->prepare($sql_select);
        $stmt->bind_param("s", $user_name);
        $stmt->execute();
        $stmt->store_result();
  
        if ($stmt->num_rows > 0) {
          $stmt->bind_result($stored_password);
          $stmt->fetch();
  
          if ($current_password === $stored_password) {
            $sql_update = "UPDATE utilizatori SET password = ? WHERE name = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("ss", $new_password, $user_name);
            $stmt_update->execute(); 
            $stmt_update->close();
          }
        } 
  
        $stmt->close();
      }
    }
  }

  $conn->close();
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
  </script>
</body>
</html>
