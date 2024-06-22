<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "Raluca.andreea123";
$dbname = "tehnologii_web";
$table = "utilizatori";
$port = 3306;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function generateToken() {
    return bin2hex(random_bytes(16)); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $rememberMe = isset($_POST['rememberMe']);

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

        if ($rememberMe) {
            $token = generateToken();
            setcookie('remember_token', $token, time() + (86400 * 30), "/");
        }

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