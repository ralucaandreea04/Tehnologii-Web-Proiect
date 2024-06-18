<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "123321445";
$dbname = "tw";
$table = "utilizatori";
$port = 3306;

// Creare conexiune
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Verificare conexiune
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verificare dacă s-a trimis o cerere POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Preiați datele trimise prin POST și escapați caracterele HTML
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $rememberMe = isset($_POST['rememberMe']) ? "Yes" : "No";
    
    echo "<h1>Remember me: $rememberMe</h1>";
    echo "<h1>Email: $email</h1>";
    echo "<h1>Password: $password</h1>";

    // Pregătirea declarației SQL cu parametri
    $stmt = $conn->prepare("SELECT id, name, email FROM $table WHERE email = ? AND password = ?");
    
    // Legare parametri
    $stmt->bind_param("ss", $email, $password);
    
    // Executarea interogării
    $stmt->execute();
    
    // Stocarea rezultatelor
    $stmt->store_result();
    
    // Afișarea numărului de rânduri returnate
    echo "<h1>Number of rows: " . $stmt->num_rows . "</h1>";

    // Verificare dacă s-a găsit cel puțin un rând (autentificare reușită)
    if ($stmt->num_rows > 0) {
        // Obținere rezultate din interogare
        $stmt->bind_result($id, $name, $email);
        $stmt->fetch();
        
        // Setare sesiune pentru a marca utilizatorul ca autentificat
        $_SESSION['loggedin'] = true;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        
        // Redirecționare către pagina de profil sau alta pagină după autentificare
        header("Location: testProfil.php");
    } else {
        // Afișare mesaj în caz de autentificare eșuată
        echo "<h1>Login Failed</h1>";
        echo "<p>Invalid email or password</p>";
    }
    
    // Închidere declarație
    $stmt->close();
}

// Închidere conexiune
$conn->close();
?>
