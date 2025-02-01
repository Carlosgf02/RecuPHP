<?php
require_once("config.php");
$conexion = obtenerConexion();

// Recuperar parámetros del formulario de edición de equipo
$idEquipo = $_POST['idEquipo']; // ID del equipo a modificar (No modificable)
$nombre = $_POST['txtNombreEquipo']; // Nuevo nombre del equipo
$logo = $_POST['txtLogoEquipo']; // Nueva URL del logo
$entrenador = $_POST['txtEntrenadorEquipo']; // Nuevo entrenador

// Definir la consulta de actualización usando consultas preparadas para mejorar la seguridad
$sql = "UPDATE teams SET team_name = ?, team_logo = ?, team_coach = ? WHERE team_id = ?;";

// Preparar consulta
$stmt = $conexion->prepare($sql);
if (!$stmt) {
    die("Error preparando la consulta: " . $conexion->error);
}

// Vincular parámetros y ejecutar
$stmt->bind_param("sssi", $nombre, $logo, $entrenador, $idEquipo);
if ($stmt->execute()) {
    $mensaje = "<h2 class='text-center mt-5'>Equipo actualizado con éxito</h2>";
} else {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje = "<h2 class='text-center mt-5'>Se ha producido un error número $numerror que corresponde a: $descrerror </h2>";
}

// Cerrar sentencia y conexión
$stmt->close();
$conexion->close();

// Incluir cabecera HTML
include_once("cabecera.html");

// Mostrar mensaje
echo $mensaje;
?>
