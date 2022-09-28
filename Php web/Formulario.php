<?php include("header.php") ?>
<?php include("navbar.php") ?>

<!-- Formulario de cotizaciones -->
<form action="cotizacion.php" method="POST">
    <h2>¡¡Haz tu cotización!!</h2>
    <fieldset>
        <!-- Campo checkbox tipo de servicios -->
        <legend>Tipo de servicio</legend>
        <label><input type="checkbox" name="sencilla" value="sencilla">habitación sencilla</label><br>
        <label><input type="checkbox" name="doble"  value="doble">habitación doble</label><br>
        <label><input type="checkbox" name="triple" value="triple">habitación Triple</label><br>
        <label><input type="checkbox" name="suite"  value="suite">habitación Suite</label><br>
        <label><input type="checkbox" name="eventos"  value="eventos">Salón de eventos</label><br>
    </fieldset>
    <br>
      
    <fieldset>
        <!-- input fecha de reservacion -->
        <legend>Fecha Reservacion</legend>
        <label><input type="date" name="fecha_entrada" value="<?php echo date('Y-m-d') ?>" required>Fecha entrada</label><br>
        <label><input type="date" name="fecha_salida" value="" required>Fecha Salida</label><br>
    </fieldset>
    <fieldset>
        <!-- datos cliente -->
        <legend>tipo usuario</legend>
        

        <!-- input radios tipo cliente  -->
        <label><input type="radio" name="tipocliente"  value="nuevo"required> Cliente nuevo</label><br>
        <label><input type="radio" name="tipocliente" value="antiguo"required>Cliente Antiguo</label><br>


    </fieldset>
    <br>
    <input type="submit" name="cotizar" value="cotizar">

</form>


<?php include("aside.php") ?>
<?php include("footer.php") ?>