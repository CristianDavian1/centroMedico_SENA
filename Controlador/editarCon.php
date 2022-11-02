<?php


if(isset($_POST['updates'])){

    include("../modelo/dataBase.php");
    require "../Modelo/consultorio.php";

    
    extract($_POST);

    $obEdi = New consultorio();
    $obEdi -> consultorioN($_POST['conNombre'],  $_GET['id']);
    $result = $obEdi->editarConsultorio();

    if($result)
    header("location: ../vista/consultorios.php?c=1");
    else
    header("location: ../vista/consultorios.php?c=1");


}


?>