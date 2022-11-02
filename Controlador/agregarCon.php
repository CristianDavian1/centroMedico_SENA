<?php

if(isset($_POST['enviar'])){

session_start();
include("../modelo/dataBase.php");
require "../Modelo/consultorio.php";


$objCon=New consultorio();
$text = ucwords(strtolower($_POST['conNombre']));
$objCon->conN1($text);
$resultado=$objCon->agregarConsultorio();
if($resultado){

    $_SESSION['message']= ' El consultorio fue agregado ';
    $_SESSION['message_type'] = 'success';
header("location: ../vista/consultorios.php?c=1");
}else
header("location: ../vista/consultorios.php?c=1");

}
if(isset($_GET['idC'])){

    session_start();
    include("../modelo/dataBase.php");

    $id = $_GET['idC'];
    
    $query = "DELETE FROM consultorio WHERE idConsultorio = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result){

    $_SESSION['message']= ' El consultorio : '.$id.' fue eliminado';
    $_SESSION['message_type'] = 'success';
    header("location: ../vista/consultorios.php?c=1");

    }else
    header("location: ../vista/consultorios.php?c=1");
}



?>

