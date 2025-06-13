<?php
include 'conect.php';

try {
    $stmt = $conn->query("SELECT TOP 5 * FROM users"); // TOP 5 para SQL Server
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<pre>";
    print_r($result);
    echo "</pre>";
} catch (PDOException $e) {
    echo "Error al consultar: " . $e->getMessage();
}
?>
