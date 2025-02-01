<?php
require_once("config.php");

$conexion = obtenerConexion();

$sql = "SELECT team_id, team_name FROM teams;"; // Corrección del nombre de la tabla

$resultado = mysqli_query($conexion, $sql);

if ($resultado === false) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

$options = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    $options .= "<option value='" . $fila["team_id"] . "'>" . $fila["team_name"] . "</option>";
}

include_once("cabecera.html");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Jugador</title>
</head>
<body>
<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="procesar_alta_jugador.php" name="frmAltaJugador" id="frmAltaJugador" method="post">
            <fieldset>
                <legend>Alta de Jugador</legend>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtPlayerName">Nombre del Jugador</label>
                    <div class="col-xs-4">
                        <input id="txtPlayerName" name="txtPlayerName" placeholder="Nombre del jugador" class="form-control" maxlength="100" type="text" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtPlayerPosition">Posición</label>
                    <div class="col-xs-4">
                        <input id="txtPlayerPosition" name="txtPlayerPosition" placeholder="Posición (Delantero, Mediocentro, etc.)" class="form-control" type="text" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtPlayerNumber">Número de Camiseta</label>
                    <div class="col-xs-4">
                        <input id="txtPlayerNumber" name="txtPlayerNumber" class="form-control" type="number" min="1" max="99" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtPlayerPhoto">URL de la Foto</label>
                    <div class="col-xs-4">
                        <input id="txtPlayerPhoto" name="txtPlayerPhoto" placeholder="URL de la foto del jugador" class="form-control" type="text" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="lstTeamId">Equipo</label>
                    <div class="col-xs-4">
                        <select name="lstTeamId" id="lstTeamId" class="form-select">
                            <?php echo $options; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group mt-4">
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarAltaJugador" name="btnAceptarAltaJugador" class="btn btn-primary" value="Registrar Jugador">
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>
