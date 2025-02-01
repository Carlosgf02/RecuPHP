<?php
require_once("config.php");
$conexion = obtenerConexion();

// Recuperar parámetro
$nombreEquipo = $_GET['txtNombreEquipo'];

// Usar consultas preparadas para prevenir inyecciones SQL
$sql = "SELECT * FROM teams WHERE team_name LIKE ?;";

$stmt = $conexion->prepare($sql);
$nombreEquipo = "%" . $nombreEquipo . "%";
$stmt->bind_param("s", $nombreEquipo);
$stmt->execute();
$resultado = $stmt->get_result();

if ($fila = mysqli_fetch_assoc($resultado)) { // Mostrar tabla si hay resultados
    $mensaje = "<h2 class='text-center'>Equipo localizado</h2>";
    $mensaje .= "<table class='table'>";
    $mensaje .= "<thead><tr><th>ID</th><th>Nombre</th><th>Ciudad</th><th>Logo</th><th>Año Fundación</th><th>Entrenador</th></tr></thead>";
    $mensaje .= "<tbody>";

    // Mostrar todas las filas encontradas
    do {
        $mensaje .= "<tr>";
        $mensaje .= "<td>" . $fila['team_id'] . "</td>";
        $mensaje .= "<td>" . $fila['team_name'] . "</td>";
        $mensaje .= "<td>" . $fila['team_city'] . "</td>";
        $mensaje .= "<td><img src='" . $fila['team_logo'] . "' width='50' height='50'></td>";
        $mensaje .= "<td>" . $fila['team_foundation_year'] . "</td>";
        $mensaje .= "<td>" . $fila['team_coach'] . "</td>";
        $mensaje .= "<td><form class='d-inline me-1' action='editar_equipo.php' method='post'>";
        $mensaje .= "<input type='hidden' name='equipo' value='" . htmlspecialchars(json_encode($fila), ENT_QUOTES) . "' />";
        $mensaje .= "<button name='Editar' class='btn btn-primary'><i class='bi bi-pencil-square'></i></button></form>";

        $mensaje .= "<form class='d-inline' action='procesar_eliminar_equipo.php' method='post'>";
        $mensaje .= "<input type='hidden' name='idEquipo' value='" . $fila['team_id'] . "' />";
        $mensaje .= "<button name='Borrar' class='btn btn-danger'><i class='bi bi-trash'></i></button></form>";

        $mensaje .= "</tr>";
    } while ($fila = mysqli_fetch_assoc($resultado));

    $mensaje .= "</tbody></table>";
} else { // No hay datos
    $mensaje = "<h2 class='text-center mt-5'>No se encontraron equipos con ese nombre</h2>";
}

// Cerrar la declaración preparada y la conexión
$stmt->close();
$conexion->close();

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
?>