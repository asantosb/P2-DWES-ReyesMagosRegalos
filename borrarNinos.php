<?php

if(!empty($_GET['id'])){
require_once('Ninos.php');
$modeloNinos = new Ninos();

$idNino = (int) filter_input(INPUT_GET, 'id');
$modeloNinos->delete($idNino);
header('Location:indexNinos.php?msg=77');
}else{
    header('Location:indexNinos.php');
}
?>