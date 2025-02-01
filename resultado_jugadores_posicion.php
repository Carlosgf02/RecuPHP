<?php
require_once("config.php");
$conexion = obtenerConexion();

// Verificar si se ha enviado una posición
$posicion = isset($_GET['txtPosicionJugador']) ? $_GET['txtPosicionJugador'] : '';

$sql = "SELECT p.*, t.team_name FROM players p 
        INNER JOIN teams t ON p.team_id = t.team_id 
        WHERE p.player_position LIKE ? 
        ORDER BY p.player_id ASC;";

$stmt = $conexion->prepare($sql);
$parametroPosicion = "%" . $posicion . "%";
$stmt->bind_param("s", $parametroPosicion);
$stmt->execute();
$resultado = $stmt->get_result();

// Incluir cabecera HTML
include_once("cabecera.html");

// Mostrar resultados
$mensaje = "<h2 class='text-center mt-5'>Jugadores en la posición: " . htmlspecialchars($posicion) . "</h2>";
$mensaje .= "<table class='table table-striped'>";
$mensaje .= "<thead><tr><th>ID</th><th>Nombre</th><th>Posición</th><th>Número</th><th>Foto</th><th>Equipo</th></tr></thead>";
$mensaje .= "<tbody>";

while ($fila = mysqli_fetch_assoc($resultado)) {
    $mensaje .= "<tr><td>" . $fila['player_id'] . "</td>";
    $mensaje .= "<td>" . $fila['player_name'] . "</td>";
    $mensaje .= "<td>" . $fila['player_position'] . "</td>";
    $mensaje .= "<td>" . $fila['player_number'] . "</td>";
    $mensaje .= "<td><img src='" . $fila['player_photo'] . "' width='50' height='50'></td>";
    $mensaje .= "<td>" . $fila['team_name'] . "</td>";

    $mensaje .= "</td></tr>";
}

$mensaje .= "</tbody></table>";

// Mostrar mensaje
echo $mensaje;

// Cerrar conexión
$stmt->close();
$conexion->close();
?>
