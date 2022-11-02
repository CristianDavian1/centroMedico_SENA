<?php

include("../modelo/dataBase.php");

if(isset($_GET['id'])){

    session_start(); 
    $id = $_GET['id'];


    $query = "DELETE paciente, usuario FROM paciente INNER JOIN usuario ON paciente.idPaciente=usuario.idUsuario WHERE paciente.idPaciente AND usuario.idUsuario='$id'";
    $resultado = mysqli_query($conn, $query);
    
    $_SESSION['message'] = 'usuario'."".'#'.$id."".'eliminado';
    $_SESSION['message type'] = 'danger';
    header("location: ../vista/superUser.php?p=1");


}
if(isset($_GET['idM'])){

    session_start(); 
    $id = $_GET['idM'];


    $query = "DELETE FROM medico WHERE idMEdico='$id'";
    $resultado = mysqli_query($conn, $query);
    
    $_SESSION['message'] = 'medico'."".'#'.$id."".'eliminado';
    $_SESSION['message type'] = 'danger';
    header("location: ../vista/medicos.php?m=1");


}


?>