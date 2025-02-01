<?php
require_once("config.php");

$conexion = obtenerConexion();

include_once("cabecera.html");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Equipo</title>
</head>
<body>
<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="procesar_alta_equipo.php" name="frmAltaEquipo" id="frmAltaEquipo" method="post">
            <fieldset>
                <legend>Alta de Equipo</legend>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtTeamName">Nombre del Equipo</label>
                    <div class="col-xs-4">
                        <input id="txtTeamName" name="txtTeamName" placeholder="Nombre del equipo" class="form-control" maxlength="100" type="text" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtTeamCity">Ciudad</label>
                    <div class="col-xs-4">
                        <input id="txtTeamCity" name="txtTeamCity" placeholder="Ciudad del equipo" class="form-control" type="text" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtTeamLogo">URL del Logo</label>
                    <div class="col-xs-4">
                        <input id="txtTeamLogo" name="txtTeamLogo" placeholder="URL de la imagen del equipo" class="form-control" type="text" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtTeamFoundationYear">Año de Fundación</label>
                    <div class="col-xs-4">
                        <input id="txtTeamFoundationYear" name="txtTeamFoundationYear" class="form-control" type="number" min="1800" max="2100" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtTeamCoach">Entrenador</label>
                    <div class="col-xs-4">
                        <input id="txtTeamCoach" name="txtTeamCoach" placeholder="Nombre del entrenador" class="form-control" type="text" required>
                    </div>
                </div>
                <div class="form-group mt-4">
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarAltaEquipo" name="btnAceptarAltaEquipo" class="btn btn-primary" value="Registrar Equipo">
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>
