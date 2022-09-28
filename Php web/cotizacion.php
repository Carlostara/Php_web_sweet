<?php

if (isset($_POST['cotizar'])) {
    //Variable tipo de cliente
    $clientes = $_POST['tipocliente'];

    //variable descuento cliente
    $cliente_nuevo = 0;
    $cliente_antiguo = 0.17;

    //Variable tipo de servicio
    $sencilla = $_POST['sencilla'] ?? "";
    $doble = $_POST['doble'] ?? "";
    $triple = $_POST['triple'] ?? "";
    $suite = $_POST['suite'] ?? "";
    $eventos = $_POST['eventos'] ?? "";


    //Variable  de fechas
    $fecha_ent = $_POST['fecha_entrada'];
    $fecha_sal = $_POST['fecha_salida'];
    // contador de fechas
    $datenow = date('d-m-Y');
    $date1 = date_create($fecha_ent);
    $date2 = date_create($fecha_sal);
    $diff = date_diff($date1, $date2);
    $dias = $diff->format("%a");

    //variable Costo por servicio
    $cost_sencilla = 50000;
    $cost_doble = 75000;
    $cost_triple = 100000;
    $cost_suite = 300000;
    $cost_eventos = 3000000;

    // variables para hacer operaciones de costo
    $valor_sencilla = 0;
    $valor_doble = 0;
    $valor_triple = 0;
    $valor_suite = 0;
    $valor_eventos = 0;

    //variable descuento por servicios prestados
    $servicios = 0;



    $iva = 0.19;
    //variable de descuento por tiempo
    $descuento_tiempo = 0;
    $descuento_servicios = 0;
    $descuento_cliente = 0;





    if ((empty($sencilla)) && (empty($doble)) && (empty($triple)) && (empty($suite)) && (empty($eventos))) {
        echo ("Por favor seleccione al menos un servicio");
    }
    if (isset($sencilla) && !empty($sencilla)) {
        $servicios = $servicios + 1;
        $valor_sencilla = $cost_sencilla * $dias;
    }
    if (isset($doble) && !empty($doble)) {
        $servicios = $servicios + 1;
        $valor_doble = $cost_doble * $dias;
    }
    if (isset($triple) && !empty($triple)) {
        $servicios = $servicios + 1;
        $valor_triple = $cost_triple * $dias;
    }
    if (isset($suite) && !empty($suite)) {
        $servicios = $servicios + 1;
        $valor_suite = $cost_suite * $dias;
    }
    if (isset($eventos) && !empty($eventos)) {
        $servicios = $servicios + 1;
        $valor_eventos = $cost_eventos * $dias;
    }

    //---------------------------------------------------------------validando descuentos por tiempo-----------------------------------------------------------------//

    if ($dias == 1) {
        $descuento_tiempo = 0;
    }
    //descuento semanal
    if ($dias >= 7 && $dias < 30) {
        $descuento_tiempo = 0.05;
    }
    //descuento mensual
    if ($dias >= 30 && $dias < 60) {
        $descuento_tiempo = 0.10;
    }
    //descuento bimensual
    if ($dias >= 60 && $dias < 180) {
        $descuento_tiempo = 0.15;
    }
    //descuento semestral
    if ($dias >= 180 && $dias < 365) {
        $descuento_tiempo = 0.20;
    }
    //descuento anual
    if ($dias == 365) {
        $descuento_tiempo = 0.30;
    }


    //Descuento por 1 servicio
    if ($servicios == 1) {
        $descuento_servicios = 0;
    }
    //Descuento por 2 servicio
    if ($servicios == 2) {
        $descuento_servicios = 0.06;
    }
    //Descuento por 3 servicio
    if ($servicios == 3) {
        $descuento_servicios = 0.12;
    }
    //Descuento por 4 servicio
    if ($servicios == 4) {
        $descuento_servicios = 0.18;
    }
    //Descuento por 5 o mas servicio
    if ($servicios >= 5) {
        $descuento_servicios = 0.20;
    }

    if ($clientes == "nuevo") {
        $descuento_cliente = 0;
    }
    //Discount per Customer Seniority
    if ($clientes == "antiguo") {
        $descuento_cliente = 0.17;
    }
}





?>

<?php include("header.php") ?>

<?php include("navbar.php") ?>




<main>
    <table>
        <thead>
            <tr>
                <th>Servicio</th>
                <th>Costo sin iva </th>
                <th>Costo con iva</th>

            </tr>


        </thead>
        <tr>
            <td>Habitación Sencilla</td>

            <td><?php echo ($valor_sencilla) ?></td>
            <td><?php echo ($valor_sencilla * $iva) + $valor_sencilla ?></td>




        </tr>
        <tr>
            <td>Habitación doble</td>
            <td><?php echo ($valor_doble) ?></td>
            <td><?php echo ($valor_doble * $iva) + $valor_doble ?></td>



        </tr>
        <tr>
            <td>Habitación triple</td>
            <td><?php echo ($valor_triple) ?></td>
            <td><?php echo ($valor_triple * $iva) + $valor_triple ?></td>


        </tr>
        <tr>
            <td>suite</td>
            <td><?php echo ($valor_suite) ?></td>
            <td><?php echo ($valor_suite * $iva) + $valor_suite ?></td>



        </tr>
        <tr>
            <td>eventos</td>
            <td><?php echo ($valor_eventos) ?></td>
            <td><?php echo ($valor_eventos * $iva) + $valor_eventos ?></td>



        </tr>


    </table>
    <br>
    <table>
        <thead>

            <h2> detalle descuentos</h2>
            <tr>
                <th>concepto </th>
                <th>valor descuento</th>
                <th>porcentaje descuento</th>
            </tr>


        </thead>

        <tr>
            <td>por tiempo</td>
            <td><?php echo ($descuento_tiempo )*$dias?>

            </td>
            <td><?php
                if ($dias < 7) {
                    echo "Diario 0%";
                }
                if ($dias == 7) {
                    echo "Semanal 5% ";
                }
                if ($dias > 7  && $dias <= 30) {
                    echo "Mensual 10%";
                }
                if ($dias > 30  && $dias <= 60) {
                    echo "Bimensual 15%";
                }
                if ($dias > 60  && $dias <= 180) {
                    echo "Semestral 20%";
                }
                if ($dias > 180) {
                    echo "Anual 30%";
                } ?></td>
        </tr>
        <tr>
            <td>por servicios cotizados</td>
            <td><?php echo ($descuento_servicios) ?></td>
            <td><?php
                if ($servicios == 1) {
                    echo " 1 servicio 0%";
                }

                if ($servicios == 2) {
                    echo " 2 servicio 6%";
                }

                if ($servicios == 3) {
                    echo " 3 servicio 12%";
                }

                if ($servicios == 4) {
                    echo " 4 servicio 18%";
                }

                if ($servicios >= 5) {
                    echo " 5 o mas servicio 20%";
                }


                ?></td>

        </tr>
        <tr>
            <td>por tipo cliente</td>
            <td><?php echo ($descuento_cliente) ?></td>
            <td><?php if ($clientes == "nuevo") {
                   echo"cliente nuevo 0%";
                }
                //Discount per Customer Seniority
                if ($clientes == "antiguo") {
                    echo"cliente antiguo 17% "; 
                } ?></td>
        </tr>

    </table>



</main>

<?php include("aside.php") ?>
<?php include("footer.php") ?>