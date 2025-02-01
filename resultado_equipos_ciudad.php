<?php
require_once("config.php");
$conexion = obtenerConexion();

// Verificar si se ha enviado una ciudad
$ciudad = isset($_GET['txtCiudadEquipo']) ? $_GET['txtCiudadEquipo'] : '';

$sql = "SELECT * FROM teams WHERE team_city LIKE ? ORDER BY team_id ASC;";

$stmt = $conexion->prepare($sql);
$parametroCiudad = "%" . $ciudad . "%";
$stmt->bind_param("s", $parametroCiudad);
$stmt->execute();
$resultado = $stmt->get_result();

// Incluir cabecera HTML
include_once("cabecera.html");

// Mostrar resultados
$mensaje = "<h2 class='text-center mt-5'>Equipos en la ciudad: " . htmlspecialchars($ciudad) . "</h2>";
$mensaje .= "<table class='table table-striped'>";
$mensaje .= "<thead><tr><th>ID</th><th>Nombre</th><th>Ciudad</th><th>Logo</th><th>Año Fundación</th><th>Entrenador</th></tr></thead>";
$mensaje .= "<tbody>";

while ($fila = mysqli_fetch_assoc($resultado)) {
    $mensaje .= "<tr><td>" . $fila['team_id'] . "</td>";
    $mensaje .= "<td>" . $fila['team_name'] . "</td>";
    $mensaje .= "<td>" . $fila['team_city'] . "</td>";
    $mensaje .= "<td><img src='" . $fila['team_logo'] . "' width='50' height='50'></td>";
    $mensaje .= "<td>" . $fila['team_foundation_year'] . "</td>";
    $mensaje .= "<td>" . $fila['team_coach'] . "</td>";

    $mensaje .= "</td></tr>";
}

$mensaje .= "</tbody></table>";

// Mostrar mensaje
echo $mensaje;

// Cerrar conexión
$stmt->close();
$conexion->close();
?>
