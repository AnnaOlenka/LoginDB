<?php
session_start();
require_once 'conect.php';       // $conn viene de aquí
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
            Hello&nbsp;
            <?php
            if (isset($_SESSION['email'])) {
                $stmt = $conn->prepare(
                    "SELECT firstName, lastName FROM users WHERE email = ?"
                );
                $stmt->execute([$_SESSION['email']]);

                if ($row = $stmt->fetch()) {
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
