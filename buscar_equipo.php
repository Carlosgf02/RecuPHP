<?php
include_once("cabecera.html"); 
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="procesar_buscar_equipo.php" name="frmBuscarEquipo" id="frmBuscarEquipo" method="get">
            <fieldset>
                <!-- Form Name -->
                <legend>Buscar un Equipo</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtNombreEquipo">Nombre</label>
                    <div class="col-xs-4">
                        <input id="txtNombreEquipo" name="txtNombreEquipo" placeholder="Nombre del equipo" class="form-control input-md" type="text">
                    </div>
                </div>
                
                <!-- Button -->
                <div class="form-group mt-4">
                    <label class="col-xs-4 control-label" for="btnAceptarBuscarEquipo"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarBuscarEquipo" name="btnAceptarBuscarEquipo" class="btn btn-primary" value="Buscar" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>
