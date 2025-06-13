<?php
include 'conect.php';

if (isset($_POST['signUp'])) {
    $firstName = trim($_POST['fName']);
    $lastName = trim($_POST['lName']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Verificar si el email ya existe
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->fetch()) {
        echo "¡El correo electrónico ya existe!";
    } else {
        // Insertar nuevo usuario
        $insertQuery = "INSERT INTO users (firstName, lastName, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        if ($stmt->execute([$firstName, $lastName, $email, $password])) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error al registrar usuario.";
        }
    }
}

if (isset($_POST['signIn'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT email, password FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $row = $stmt->fetch();

    if ($row && password_verify($password, $row['password'])) {
        session_start();
        $_SESSION['email'] = $row['email'];
        header("Location: homepagee.php");
        exit();
    } else {
        echo "Correo o contraseña incorrectos.";
    }
}
?>
