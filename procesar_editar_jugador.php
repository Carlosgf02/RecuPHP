<?php
require_once("config.php");
$conexion = obtenerConexion();

// Recuperar parámetros del formulario de edición de jugador
$idJugador = $_POST['idJugador']; 
$nombre = $_POST['txtNombreJugador']; 
$posicion = $_POST['txtPosicionJugador']; 
$numero = $_POST['txtNumeroJugador']; 
$equipoId = $_POST['lstEquipoJugador']; 

$sql = "UPDATE players SET player_name = ?, player_position = ?, player_number = ?, team_id = ? WHERE player_id = ?;";

// Preparar consulta
$stmt = $conexion->prepare($sql);
if (!$stmt) {
    die("Error preparando la consulta: " . $conexion->error);
}

// Vincular parámetros y ejecutar
$stmt->bind_param("ssiii", $nombre, $posicion, $numero, $equipoId, $idJugador);
if ($stmt->execute()) {
    $mensaje = "<h2 class='text-center mt-5'>Jugador actualizado con éxito</h2>";
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
