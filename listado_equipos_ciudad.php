<?php
require_once("config.php");

include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="resultado_equipos_ciudad.php" method="get">
            <fieldset>
                <!-- Form Name -->
                <legend>Buscar equipos por ciudad</legend>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtCiudadEquipo">Ciudad</label>
                    <div class="col-xs-4">
                        <input id="txtCiudadEquipo" name="txtCiudadEquipo" placeholder="Ejemplo: Madrid, Barcelona..." class="form-control input-md" type="text" required>
                    </div>
                </div>
                <!-- Button -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarBuscarEquiposCiudad"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarBuscarEquiposCiudad" name="btnAceptarBuscarEquiposCiudad" class="btn btn-primary" value="Buscar" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>
