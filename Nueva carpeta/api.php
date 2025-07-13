<?php
include 'conexion.php';
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET': // Obtener registros de una tabla
        $tabla = $_GET['tabla'];
        $result = $conexion->query("SELECT * FROM $tabla");
        echo json_encode($result->fetch_all(MYSQLI_ASSOC));
        break;

    case 'POST': // Insertar un nuevo registro
        $data = json_decode(file_get_contents("php://input"), true);
        $tabla = $data['tabla'];
        $campos = implode(",", array_keys($data['datos']));
        $valores = "'" . implode("','", array_values($data['datos'])) . "'";
        $conexion->query("INSERT INTO $tabla ($campos) VALUES ($valores)");
        echo json_encode(["success" => $conexion->affected_rows > 0]);
        break;

    case 'PUT': // Actualizar un registro
        $data = json_decode(file_get_contents("php://input"), true);
        $tabla = $data['tabla'];
        $id = $data['id'];
        $nuevoValor = $data['nuevoValor'];
        $conexion->query("UPDATE $tabla SET nombre='$nuevoValor' WHERE id=$id");
        echo json_encode(["success" => $conexion->affected_rows > 0]);
        break;

    case 'DELETE': // Eliminar un registro
        $data = json_decode(file_get_contents("php://input"), true);
        $tabla = $data['tabla'];
        $id = $data['id'];
        $conexion->query("DELETE FROM $tabla WHERE id=$id");
        echo json_encode(["success" => $conexion->affected_rows > 0]);
        break;
}
?>
