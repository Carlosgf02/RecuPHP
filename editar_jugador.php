<?php
// Recupero datos de parámetro en forma de array asociativo
$jugador = json_decode($_POST['jugador'], true);

require_once("config.php");
$conexion = obtenerConexion();

// Obtener equipos para el select
$sql = "SELECT team_id, team_name FROM teams";
$resultado = mysqli_query($conexion, $sql);

if ($resultado === false) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

$options = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    $selected = ($fila["team_id"] == $jugador['team_id']) ? "selected" : "";
    $options .= "<option value='" . $fila["team_id"] . "' $selected>" . $fila["team_name"] . "</option>";
}

// Cabecera HTML que incluye navbar
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="procesar_editar_jugador.php" name="frmEditarJugador" id="frmEditarJugador" method="post">
            <fieldset>
                <!-- Form Name -->
                <legend>Modificación de Jugador</legend>
                
                <!-- Text input for Player Name -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtNombreJugador">Nombre del Jugador</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $jugador['player_name'] ?>" id="txtNombreJugador" name="txtNombreJugador" placeholder="Nombre del jugador" class="form-control input-md" type="text" required>
                    </div>
                </div>

                <!-- Text input for Player Position -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtPosicionJugador">Posición</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $jugador['player_position'] ?>" id="txtPosicionJugador" name="txtPosicionJugador" placeholder="Posición (Delantero, Mediocentro, etc.)" class="form-control input-md" type="text" required>
                    </div>
                </div>

                <!-- Number input for Player Number -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtNumeroJugador">Número de Camiseta</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $jugador['player_number'] ?>" id="txtNumeroJugador" name="txtNumeroJugador" class="form-control input-md" type="number" min="1" max="99" required>
                    </div>
                </div>

                <!-- Select input for Player Team -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="lstEquipoJugador">Equipo</label>
                    <div class="col-xs-4">
                        <select id="lstEquipoJugador" name="lstEquipoJugador" class="form-select">
                            <?php echo $options; ?>
                        </select>
                    </div>
                </div>

                <!-- Hidden input for Player ID -->
                <input value="<?php echo $jugador['player_id'] ?>" type="hidden" name="idJugador" id="idJugador" />

                <!-- Button -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarEditarJugador"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarEditarJugador" name="btnAceptarEditarJugador" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>
