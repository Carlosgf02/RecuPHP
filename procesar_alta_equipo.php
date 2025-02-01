<?php
require_once("config.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$nombre = $_POST['txtTeamName'];
$ciudad = $_POST['txtTeamCity'];
$logo = $_POST['txtTeamLogo'];
$fundacion = $_POST['txtTeamFoundationYear'];
$entrenador = $_POST['txtTeamCoach'];

// Preparar la consulta para insertar en la tabla 'teams'
$sql = "INSERT INTO teams (team_name, team_city, team_logo, team_foundation_year, team_coach) VALUES (?, ?, ?, ?, ?);";

$stmt = $conexion->prepare($sql);
if (!$stmt) {
    die("Error preparando la consulta: " . $conexion->error);
}

// Vincular parámetros a la consulta preparada
$stmt->bind_param("sssds", $nombre, $ciudad, $logo, $fundacion, $entrenador);

// Ejecutar consulta
if ($stmt->execute()) {
    $mensaje = "<h2 class='text-center mt-5'>Equipo insertado con éxito</h2><br><h4 class='text-center mt-5'>Redirigiendo a la página de alta de equipo...</h4>";
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
echo "<script>setTimeout(function(){ window.location.href = 'alta_equipo.php'; }, 5000);</script>";
?>
