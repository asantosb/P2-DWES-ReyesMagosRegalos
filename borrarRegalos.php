<?php
 
if(!empty($_GET)){
    require_once('Regalos.php');
    $modeloRegalos = new Regalos();

    $idJuguete = (int) filter_input(INPUT_GET, 'id');
    $modeloRegalos->delete($idJuguete);
    header('Location:indexRegalos.php?msg=77');
}else{
    header('Location:indexRegalos.php');
}
?>