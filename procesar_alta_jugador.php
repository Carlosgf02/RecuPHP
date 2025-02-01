<?php
require_once("config.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$nombre = $_POST['txtPlayerName'];
$posicion = $_POST['txtPlayerPosition'];
$numero = $_POST['txtPlayerNumber'];
$foto = $_POST['txtPlayerPhoto'];
$equipo_id = $_POST['lstTeamId'];

// Preparar la consulta para insertar en la tabla 'players'
$sql = "INSERT INTO players (player_name, player_position, player_number, player_photo, team_id) VALUES (?, ?, ?, ?, ?);";

$stmt = $conexion->prepare($sql);
if (!$stmt) {
    die("Error preparando la consulta: " . $conexion->error);
}

// Vincular parámetros a la consulta preparada
$stmt->bind_param("ssisi", $nombre, $posicion, $numero, $foto, $equipo_id);

// Ejecutar consulta
if ($stmt->execute()) {
    $mensaje = "<h2 class='text-center mt-5'>Jugador insertado con éxito</h2><br><h4 class='text-center mt-5'>Redirigiendo a la página de alta de jugador...</h4>";
} else {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje = "<h2 class='text-center mt-5'>Se ha producido un error número $numerror que corresponde a: $descrerror</h2>";
}

$stmt->close();
$conexion->close();

// Mostrar mensaje
echo $mensaje;

// Usar JavaScript para redireccionar después de 5 segundos
echo "<script>setTimeout(function(){ window.location.href = 'alta_jugador.php'; }, 5000);</script>";
?>
