<?php
session_start(); // Iniciar la sesión
include 'conect.php'; // Asegúrate de que este archivo establece $conn
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <div style="text-align:center; padding:15%;">
        <p style="font-size:50px; font-weight:bold;">
        Hello  
        <?php 
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $query = mysqli_query($conn, "SELECT firstName, lastName FROM users WHERE email='$email'");
            if ($row = mysqli_fetch_assoc($query)) {
                echo htmlspecialchars($row['firstName'] . ' ' . $row['lastName']);
            } else {
                echo "User";
            }
        } else {
            echo "Guest";
        }
        ?>
        :)
        </p>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
