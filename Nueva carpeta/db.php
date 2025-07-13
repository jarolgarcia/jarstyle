<?php
// Configuración de la base de datos
$host = 'b9t0gyzaum6xp5ksq9k7-mysql.services.clever-cloud.com';
$user = 'ul0cpphkjyrryloz';
$password = 'ul0cpphkjyrryloz';
$database = 'jarol_garcia';

// Crear conexión
$conn = new mysqli($host, $user, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
