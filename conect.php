<?php
// Evita errores de CORS y habilita políticas de seguridad requeridas por Google
header("Cross-Origin-Opener-Policy: same-origin");
header("Cross-Origin-Embedder-Policy: require-corp");

/* Parámetros de conexión */
$serverName = "DESKTOP-B5B1VLD\\MSSQLSERVER01";   // Instancia
$database   = "login";                           // Base de datos
$username   = "sa";                              // Usuario SQL Server
$password   = "contraseña";                  // Contraseña

try {
    /* DSN para SQL Server con PDO */
    $conn = new PDO(
        "sqlsrv:Server=$serverName;Database=$database",
        $username,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );
} catch (PDOException $e) {
    die("Conexión fallida: " . $e->getMessage());
}
?>