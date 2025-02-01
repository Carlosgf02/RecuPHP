<?php
require_once("config.php");
$conexion = obtenerConexion();

// Recuperar parámetro
$nombreJugador = $_GET['txtNombreJugador'];

// Usar consultas preparadas para prevenir inyecciones SQL
$sql = "SELECT * FROM players WHERE player_name LIKE ?;";

$stmt = $conexion->prepare($sql);
$nombreJugador = "%" . $nombreJugador . "%";
$stmt->bind_param("s", $nombreJugador);
$stmt->execute();
$resultado = $stmt->get_result();

if ($fila = mysqli_fetch_assoc($resultado)) { // Mostrar tabla si hay resultados
    $mensaje = "<h2 class='text-center'>Jugador localizado</h2>";
    $mensaje .= "<table class='table'>";
    $mensaje .= "<thead><tr><th>ID</th><th>Nombre</th><th>Posición</th><th>Número</th><th>Foto</th><th>ID Equipo</th></tr></thead>";
    $mensaje .= "<tbody>";

    // Mostrar todas las filas encontradas
    do {
        $mensaje .= "<tr>";
        $mensaje .= "<td>" . $fila['player_id'] . "</td>";
        $mensaje .= "<td>" . $fila['player_name'] . "</td>";
        $mensaje .= "<td>" . $fila['player_position'] . "</td>";
        $mensaje .= "<td>" . $fila['player_number'] . "</td>";
        $mensaje .= "<td><img src='" . $fila['player_photo'] . "' width='50' height='50'></td>";
        $mensaje .= "<td>" . $fila['team_id'] . "</td>";

        $mensaje .= "<td><form class='d-inline me-1' action='editar_jugador.php' method='post'>";
        $mensaje .= "<input type='hidden' name='jugador' value='" . htmlspecialchars(json_encode($fila), ENT_QUOTES) . "' />";
        $mensaje .= "<button name='Editar' class='btn btn-primary'><i class='bi bi-pencil-square'></i></button></form>";

        $mensaje .= "<form class='d-inline' action='procesar_eliminar_jugador.php' method='post'>";
        $mensaje .= "<input type='hidden' name='idJugador' value='" . $fila['player_id'] . "' />";
        $mensaje .= "<button name='Borrar' class='btn btn-danger'><i class='bi bi-trash'></i></button></form>";

        $mensaje .= "</tr>";
    } while ($fila = mysqli_fetch_assoc($resultado));

    $mensaje .= "</tbody></table>";
} else { // No hay datos
    $mensaje = "<h2 class='text-center mt-5'>No se encontraron jugadores con ese nombre</h2>";
}

// Cerrar la declaración preparada y la conexión
$stmt->close();
$conexion->close();

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
?>