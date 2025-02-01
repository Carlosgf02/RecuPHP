<?php
require_once("config.php");
$conexion = obtenerConexion();

// Consulta para seleccionar todos los equipos
$sql = "SELECT * FROM teams ORDER BY team_id ASC;";
$resultado = mysqli_query($conexion, $sql);

// Montar tabla
$mensaje = "<h2 class='text-center'>Listado de Equipos:</h2>";
$mensaje .= "<table class='table table-striped'>";
$mensaje .= "<thead><tr><th>ID</th><th>Nombre</th><th>Ciudad</th><th>Logo</th><th>Año Fundación</th><th>Entrenador</th></tr></thead>";
$mensaje .= "<tbody>";

// Recorrer filas
while ($fila = mysqli_fetch_assoc($resultado)) {
    $mensaje .= "<tr><td>" . $fila['team_id'] . "</td>";
    $mensaje .= "<td>" . $fila['team_name'] . "</td>";
    $mensaje .= "<td>" . $fila['team_city'] . "</td>";
    $mensaje .= "<td><img src='" . $fila['team_logo'] . "' width='50' height='50'></td>";
    $mensaje .= "<td>" . $fila['team_foundation_year'] . "</td>";
    $mensaje .= "<td>" . $fila['team_coach'] . "</td>";

    $mensaje .= "</td></tr>";
}

// Cerrar tabla
$mensaje .= "</tbody></table>";

include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
?>
