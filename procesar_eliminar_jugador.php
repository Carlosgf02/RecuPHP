<?php
require_once("config.php");
$conexion = obtenerConexion();

// Verificar si se ha enviado un ID de jugador
if (isset($_POST['idJugador'])) {
    $idJugador = $_POST['idJugador'];

    // Preparar la consulta para eliminar el jugador
    $sql = "DELETE FROM players WHERE player_id = ?;";

    $stmt = $conexion->prepare($sql);
    if (!$stmt) {
        die("Error preparando la consulta: " . $conexion->error);
    }

    // Vincular parámetro a la consulta preparada
    $stmt->bind_param("i", $idJugador);

    // Ejecutar consulta
    if ($stmt->execute()) {
        echo "<script>alert('Jugador eliminado con éxito'); window.location.href='cabecera.html';</script>";
    } else {
        die("Error al eliminar jugador: " . mysqli_error($conexion));
    }

    $stmt->close();
} else {
    echo "<script>alert('Error: No se ha proporcionado un ID válido'); window.location.href='buscar_jugador.php';</script>";
}

$conexion->close();
?>
