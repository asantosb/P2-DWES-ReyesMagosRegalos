<?php

require_once('Regalos.php');
$modeloRegalos = new Regalos();

if(!empty($_POST)){
    $datosRegalo = [];
    $datosRegalo['nombre'] = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $datosRegalo['precio'] = (float)str_replace(',','.',filter_input(INPUT_POST, 'precio', FILTER_SANITIZE_STRING));
    $datosRegalo['id_reymago'] = rand(1,3);
    try {
        $id = $modeloRegalos->insert($datosRegalo);
        if ((int) $id) {
            $mensajeOK = 'Se ha dado de alta un regalo correctamente.';
            header('Refresh: 1; URL=indexRegalos.php');
        }
    } catch (Exception $ex) {
        $mensajeKO = $ex->getMessage();
    }
}
?>
<!doctype html>
<html lang="es">
    <head>
       <?php echo Utils::getHead('Alta Regalo'); ?>
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
            <div class="row ">
                <div class="col-12 col-md-4 offset-md-4 mt-4">
                    <h1>Alta Regalo</h1>
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
                <div class="col-12 col-md-4 offset-md-4">
                    <form action="crearRegalos.php" method="post">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required/>
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio:</label>
                            <input type="number" class="form-control" id="precio" name="precio" placeholder="0.00" required/>
                        </div>
                        <div class="col-12 text-center align-items-center mt-2">
                        <a href="indexRegalos.php" class="btn btn-success float-right"><i class="bi bi-arrow-90deg-left"></i> Volver</a>
                        <button type="submit" class="btn btn-success text-warning"><i class="bi bi-plus"></i> Crear</button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>