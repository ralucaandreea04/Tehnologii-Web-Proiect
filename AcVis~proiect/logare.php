<?php   
        if (isset($_POST['email'])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            
            echo "<p>Your email is: " . $email . "</p>";
            echo "<p>Your password is: " . $password . "</p>";
            print_r($_POST);
        } else {
            echo "<p>Error: Email or password is missing.</p>";
        }
?>