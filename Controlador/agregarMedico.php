<?php

extract($_POST);

session_start();
include("../modelo/dataBase.php");
require "../Modelo/medico.php";

$objMedico=New medico();
$text = ucwords(strtolower($_POST['medNombres']));
$text2 = ucwords(strtolower($_POST['medApellidos']));
$text3 = ucwords(strtolower($_POST['medEspecialidad']));
$objMedico->crearMedico($_POST['medIdentificacion'], $text, $text2, $text3,
$_POST['medTelefono'],$_POST['medCorreo']);
$resultado=$objMedico->agregarMedico();
if($resultado){
$_SESSION['message']= 'Medico agregado';
$_SESSION['message_type'] = 'success';
header("location: ../vista/medicos.php?m=1");
} else
$_SESSION['messageA']= 'Error al agregar medico agregado';
$_SESSION['message_type'] = 'success';
header("location: ../vista/medicos.php?m=1");

?>