<?php

require_once('Regalos.php');
$modeloRegalos = new Regalos();

$id = 0;
if(!empty($_POST)){
    $datosRegalo = [];
    $datosRegalo['id_juguete'] = (int)filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
    $datosRegalo['nombre'] = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $datosRegalo['precio'] = (float)str_replace(',','.',filter_input(INPUT_POST, 'precio', FILTER_SANITIZE_STRING));

    try {
        $id = $modeloRegalos->update($datosRegalo);
        if ((int) $id) {
            $mensajeOK = 'El dato del regalo se ha actualizado correctamente.';
            header('Refresh: 1; URL=indexRegalos.php');
        }
    } catch (Exception $ex) {
        $mensajeKO = $ex->getMessage();
        $id = $datosRegalo['id_juguete'];
    }

}else if(!empty($_GET)){
    $id = (int) filter_input(INPUT_GET, 'id');
}
$regalo = $modeloRegalos->select($id);
if($regalo == null){
    header('Location:indexRegalos.php?msg=66');
}

?>
<!doctype html>
<html lang="es">
    <head>
       <?php echo Utils::getHead('Editar Regalo'); ?>
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
                    <h1>Editar Regalo</h1>
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
                    <form action="editarRegalos.php" method="post">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $regalo['nombre']; ?>" required/>
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio:</label>
                            <input type="text" class="form-control" id="precio" name="precio" placeholder="0.00" value="<?php echo $regalo['precio']; ?>" required/>
                        </div>
                        <div class="col-12 text-center align-items-center mt-2">
                        <input type="hidden" name="id" value="<?php echo $regalo['id_juguete']; ?>"/>
                        <a href="indexRegalos.php" class="btn btn-success float-right"><i class="bi bi-arrow-90deg-left"></i> Volver</a>
                        <button type="submit" class="btn btn-success text-warning"><i class="bi bi-plus"></i> Editar</button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>