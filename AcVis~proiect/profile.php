<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: loginWEB.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon.png" type="image/x-icon">
    <title>Sag Awards | Profile</title>
    <link rel="stylesheet" href="cssProfilePage.css">
</head>
<body>
    <div class="profile-container">
        <div class="profile-image">
            <img src="user.png" alt="Profile Picture">
        </div>
        <div class="profile-details">
            <h1 class="profile-name">Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?>!</h1>
            <div class="profile-info">
                <div class="info-item">
                    <label>Name:</label>
                    <span><?php echo htmlspecialchars($_SESSION['name']); ?></span>
                </div>
                <div class="info-item">
                    <label>Email:</label>
                    <span><?php echo htmlspecialchars($_SESSION['email']); ?></span>
                </div>
                <div class="info-item">
                    <label>Role:</label>
                    <span>Admin</span>
            </div>
            <button class="logout-button" onclick="window.location.href='logout.php'">Logout</button>
        </div>
    </div>
</body>
</html>
