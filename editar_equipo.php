<?php
// Recupero datos de parámetro en forma de array asociativo
$equipo = json_decode($_POST['equipo'], true);

require_once("config.php");
$conexion = obtenerConexion();

// Cabecera HTML que incluye navbar
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="procesar_editar_equipo.php" name="frmEditarEquipo" id="frmEditarEquipo" method="post">
            <fieldset>
                <legend>Modificación de Equipo</legend>
                
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtNombreEquipo">Nombre del Equipo</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $equipo['team_name'] ?>" id="txtNombreEquipo" name="txtNombreEquipo" placeholder="Nombre del equipo" class="form-control input-md" type="text" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtLogoEquipo">URL del Logo</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $equipo['team_logo'] ?>" id="txtLogoEquipo" name="txtLogoEquipo" placeholder="URL del logo del equipo" class="form-control input-md" type="text" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtEntrenadorEquipo">Entrenador</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $equipo['team_coach'] ?>" id="txtEntrenadorEquipo" name="txtEntrenadorEquipo" placeholder="Nombre del entrenador" class="form-control input-md" type="text" required>
                    </div>
                </div>

                <input value="<?php echo $equipo['team_id'] ?>" type="hidden" name="idEquipo" id="idEquipo" />

                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarEditarEquipo"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarEditarEquipo" name="btnAceptarEditarEquipo" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>
