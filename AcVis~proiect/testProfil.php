<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="icon.png" type="image/x-icon">
  <title>SAG Awards | Profile </title>
  <style>
    body {
      font-family: Bookman Old Style;
      line-height: 1.6;
      background-color: #f0f0f0;
      padding: 20px;
      display: flex;
      flex-direction: column;
      height: 800px;
      justify-content: flex-start;
      align-items: center;
    }

    .admin-menu {
      background-color: #D4AF37;
      color: #f2f2f2;
      padding: 10px 20px;
      border-radius: 20px;
      margin-bottom: 20px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
      width: 100%;
      box-sizing: border-box;
      font-weight: bold;
      font-size: 20px;
      position: fixed;
      top: 0;
      z-index: 1000;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logout-button {
      background-color: white;
      color: #D4AF37;
      border: 2px solid #D4AF37;
      border-radius: 20px;
      padding: 5px 10px;
      font-size: 16px;
      cursor: pointer;
    }

    .logout-button:hover {
      background-color: white;
      color: #D4AF37;
    }

    .form-action-container {
      display: flex;
      gap: 20px;
      width: 100%;
      height: 600px;
      border-radius: 20px;
      overflow: hidden;
      margin-top: 50px;
    }

    .form-container {
      flex: 0 0 30%;
      background-color: #fff;
      padding: 20px;
      overflow: hidden;
      border-radius: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      height: 100%;
      overflow-y: auto;
    }

    .custom-container {
      flex: 1;
      background-color: #fff;
      padding: 20px;
      border-radius: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      height: 558px;
      overflow-y: auto;
    }

    .custom-content {
      overflow-x: auto;
    }

    .data-table {
      width: 100%;
      border-collapse: collapse;
      border: 1px solid #ddd;
      border-radius: 20px;
      overflow: hidden;
    }

    .data-table th,
    .data-table td {
      padding: 10px;
      text-align: left;
      border: 1px solid #ddd;
    }

    .data-table th {
      background-color: #f2f2f2;
    }

    .data-table tbody tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    .data-table tbody tr:hover {
      background-color: #e9e9e9;
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
  $dbname = "tehnologii_web";
  $table = "screen_actor_guild_awards"; 
  $port = 3306;
  $password = "Raluca.andreea123";
  $conn = new mysqli($servername, $username,$password, $dbname, $port);

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

    if ($stmt->execute()) {
      echo "<script>alert('Record added successfully.');</script>";
    } else {
      echo "<script>alert('Error adding record.');</script>";
    }

    $stmt->close();
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_record'])) {
    $delete_id = $_POST['delete_id'];
    $sql_delete = "DELETE FROM `$table` WHERE id = ?";
    $stmt = $conn->prepare($sql_delete);
    $stmt->bind_param("s", $delete_id);

    if ($stmt->execute()) {
      echo "<script>alert('Record deleted successfully.');</script>";
    } else {
      echo "<script>alert('Error deleting record.');</script>";
    }

    $stmt->close();
  }
  $conn->close();
  ?>

  <div class="admin-menu">
    Admin: <?php echo htmlspecialchars($_SESSION['name']); ?>
    <form action="logout.php" method="post" style="display: inline;">
      <button type="submit" class="logout-button">LOGOUT</button>
    </form>
  </div>

  <div class="form-action-container">
    <div class="form-container">
      <div id="add-form">
        <h2>Add New Record</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
          <div class="form-group">
            <label for="delete_id">Record ID:</label>
            <input type="text" id="delete_id" name="delete_id" required>
          </div>
          <button type="submit" name="delete_record" class="btn">Delete Record</button>
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

</body>
</html>
