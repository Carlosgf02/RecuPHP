<?php
require_once("config.php");

include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="resultado_jugadores_posicion.php" method="get">
            <fieldset>
                <!-- Form Name -->
                <legend>Buscar jugadores por posición</legend>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtPosicionJugador">Posición</label>
                    <div class="col-xs-4">
                        <input id="txtPosicionJugador" name="txtPosicionJugador" placeholder="Ejemplo: Delantero, Defensa..." class="form-control input-md" type="text" required>
                    </div>
                </div>
                <!-- Button -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarBuscarJugadoresPosicion"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarBuscarJugadoresPosicion" name="btnAceptarBuscarJugadoresPosicion" class="btn btn-primary" value="Buscar" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>
