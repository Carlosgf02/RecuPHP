<?php
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="procesar_buscar_jugador.php" name="frmBuscarJugador" id="frmBuscarJugador" method="get">
            <fieldset>
                <!-- Form Name -->
                <legend>Buscar un Jugador</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtNombreJugador">Nombre</label>
                    <div class="col-xs-4">
                        <input id="txtNombreJugador" name="txtNombreJugador" placeholder="Nombre del jugador" class="form-control input-md" type="text">
                    </div>
                </div>
                
                <!-- Button -->
                <div class="form-group mt-4">
                    <label class="col-xs-4 control-label" for="btnAceptarBuscarJugador"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarBuscarJugador" name="btnAceptarBuscarJugador" class="btn btn-primary" value="Buscar" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>
