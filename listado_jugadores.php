<?php
require_once("config.php");
$conexion = obtenerConexion();

// Consulta para seleccionar todos los jugadores con su equipo
$sql = "SELECT p.*, t.team_name FROM players p 
        INNER JOIN teams t ON p.team_id = t.team_id 
        ORDER BY p.player_id ASC;";
$resultado = mysqli_query($conexion, $sql);

// Montar tabla
$mensaje = "<h2 class='text-center'>Listado de Jugadores:</h2>";
$mensaje .= "<table class='table table-striped'>";
$mensaje .= "<thead><tr><th>ID</th><th>Nombre</th><th>Posición</th><th>Número</th><th>Foto</th><th>Equipo</th></tr></thead>";
$mensaje .= "<tbody>";

// Recorrer filas
while ($fila = mysqli_fetch_assoc($resultado)) {
    $mensaje .= "<tr><td>" . $fila['player_id'] . "</td>";
    $mensaje .= "<td>" . $fila['player_name'] . "</td>";
    $mensaje .= "<td>" . $fila['player_position'] . "</td>";
    $mensaje .= "<td>" . $fila['player_number'] . "</td>";
    $mensaje .= "<td><img src='" . $fila['player_photo'] . "' width='50' height='50'></td>";
    $mensaje .= "<td>" . $fila['team_name'] . "</td>";

    $mensaje .= "</tr>";
}

// Cerrar tabla
$mensaje .= "</tbody></table>";

include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
?>
