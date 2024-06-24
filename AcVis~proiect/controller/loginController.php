<?php
require_once __DIR__.'/../db.php';
session_start();
$conn = get_db_connection();
$table = "utilizatori";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $stmt = $conn->prepare("SELECT id, name, email FROM $table WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $name, $email);
        $stmt->fetch();

        $_SESSION['loggedin'] = true;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;

        header("Location: /AcVis~proiect/public/adminpage");
        exit;
    } else {
        echo "<h1>Login Failed</h1>";
        echo "<p>Invalid email or password</p>";
    }
    
    $stmt->close();
}

$conn->close();
require __DIR__.'/../view/loginView.php';
?>
