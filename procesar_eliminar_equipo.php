<?php
require_once("config.php");
$conexion = obtenerConexion();

// Verificar si se ha enviado un ID de equipo
if (isset($_POST['idEquipo'])) {
    $idEquipo = $_POST['idEquipo'];

    // Verificar si hay jugadores asociados al equipo antes de eliminarlo
    $sql_verificar = "SELECT COUNT(*) AS total FROM players WHERE team_id = ?";
    $stmt_verificar = $conexion->prepare($sql_verificar);
    $stmt_verificar->bind_param("i", $idEquipo);
    $stmt_verificar->execute();
    $resultado_verificar = $stmt_verificar->get_result();
    $fila_verificar = $resultado_verificar->fetch_assoc();

    if ($fila_verificar['total'] > 0) {
        echo "<script>alert('No se puede eliminar el equipo porque tiene jugadores asociados.'); window.location.href='listado_jugadores.php';</script>";
        exit();
    }

    // Preparar la consulta para eliminar el equipo
    $sql = "DELETE FROM teams WHERE team_id = ?;";

    $stmt = $conexion->prepare($sql);
    if (!$stmt) {
        die("Error preparando la consulta: " . $conexion->error);
    }

    // Vincular parámetro a la consulta preparada
    $stmt->bind_param("i", $idEquipo);

    // Ejecutar consulta
    if ($stmt->execute()) {
        echo "<script>alert('Equipo eliminado con éxito'); window.location.href='listado_equipos.php';</script>";
    } else {
        die("Error al eliminar equipo: " . mysqli_error($conexion));
    }

    $stmt->close();
} else {
    echo "<script>alert('Error: No se ha proporcionado un ID válido'); window.location.href='buscar_equipo.php';</script>";
}

$conexion->close();
?>
