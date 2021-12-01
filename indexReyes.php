<?php

require_once('Reyes.php');
$modeloReyes = new Reyes();
$rowsMelchor = $modeloReyes->selectAllMelchor();
$rowsGaspar = $modeloReyes->selectAllGaspar();
$rowsBaltasar = $modeloReyes->selectAllBaltasar();
$rowsGastoMelchor = $modeloReyes->selectGastoTotalMelchor();
$rowsGastoGaspar = $modeloReyes->selectGastoTotalGaspar();
$rowsGastoBaltasar = $modeloReyes->selectGastoTotalBaltasar();

if (($rowsMelchor->num_rows == 0) && ($rowsGaspar->num_rows == 0) && ($rowsBaltasar->num_rows == 0)) {
    $mensajeKO = 'No hay ningún dato guardado.';
}

?>
<!doctype html>
<html lang="es">

<head>
    <?php echo Utils::getHead('Datos de los Reyes Magos'); ?>
</head>

<body>
    <header>
        <div id="my-row-01" class="my-row bg-success">
            <div class="container">
                <div class="row text-center justify-content-center align-items-center">
                    <div class="col-12">
                        <h2 class="text-warning">Base de Datos - Reyes Magos</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row text-center align-items-center justify-content-centers">
            <div class="col-12 mt-4">
                <h1>Datos de los Reyes Magos</h1>
                <?php if (isset($mensajeOK)) { ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $mensajeOK; ?>
                    </div>
                <?php } else if (isset($mensajeKO)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $mensajeKO; ?>
                    </div>
                <?php } ?>
            </div>
            <?php if (((int)$rowsMelchor->num_rows) && ((int)$rowsGastoMelchor->num_rows)) { ?>
                <div class="col-12 mt-4">
                    <table class="table table-striped">
                        <h1 class="text-danger">Melchor</h1>
                        <thead>
                            <tr>
                                <th class="text-center">Regalo</th>
                                <th class="text-center">Niño</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $rowsMelchor->fetch_row()) { ?>
                                <tr>
                                    <td><?php echo $row[0]; ?></td>
                                    <td><?php echo $row[1]; ?></td>
                                </tr>
                            <?php } ?>
                            <?php while ($row = $rowsGastoMelchor->fetch_row()) { ?>
                                <tr>
                                    <th>Gasto Total:</th>
                                    <th><?php echo $row[0]; ?>€</th>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
            <?php if (((int)$rowsGaspar->num_rows) && ((int)$rowsGastoGaspar->num_rows)) { ?>
                <div class="col-12 mt-4">
                    <table class="table table-striped">
                        <h1 class="text-success">Gaspar</h1>
                        <thead>
                            <tr>
                                <th class="text-center">Regalo</th>
                                <th class="text-center">Niño</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $rowsGaspar->fetch_row()) { ?>
                                <tr>

                                    <td><?php echo $row[0]; ?></td>
                                    <td><?php echo $row[1]; ?></td>

                                </tr>
                            <?php } ?>
                            <?php while ($row = $rowsGastoGaspar->fetch_row()) { ?>
                                <tr>
                                    <th>Gasto Total:</th>
                                    <th><?php echo $row[0]; ?>€</th>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
            <?php if (((int)$rowsBaltasar->num_rows) && ((int)$rowsGastoBaltasar->num_rows)) { ?>
                <div class="col-12 mt-4">
                    <table class="table table-striped">
                        <h1 class="text-warning">Baltasar</h1>
                        <thead>
                            <tr>
                                <th class="text-center">Regalo</th>
                                <th class="text-center">Niño</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $rowsBaltasar->fetch_row()) { ?>
                                <tr>

                                    <td><?php echo $row[0]; ?></td>
                                    <td><?php echo $row[1]; ?></td>

                                </tr>
                            <?php } ?>
                            <?php while ($row = $rowsGastoBaltasar->fetch_row()) { ?>
                                <tr>
                                    <th>Gasto Total:</th>
                                    <th><?php echo $row[0]; ?>€</th>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            <?php } ?>
            <div class="col-12 mt-4">
                <a href="index.html" class="btn btn-success float-right"><i class="bi bi-arrow-90deg-left"></i> Volver</a>
            </div>
        </div>
    </div>
</body>

</html>