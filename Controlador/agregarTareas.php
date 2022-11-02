<?php

 include("../modelo/dataBase.php");





if (isset($_POST['enviar'])){

    session_start();
    $nombres = $_POST['pacNombres'];
    $apellidos = $_POST['pacApellidos'];
    $identificacion = $_POST['pacIdentificacion'];
    $fechaNacimiento = $_POST['pacFechaNacimiento'];
    $sexo  = $_POST['pacSexo'];
    $correo = $_POST['usuLogin'];
    $contraseña = $_POST['usuPassword'];
    
     
    
    }

    
    function repetido($dato, $conn){
    $validar;
    $query = "SELECT * FROM usuario WHERE usuLogin = '$dato';";
    $resultado = mysqli_query($conn, $query);
    $columnas = mysqli_num_rows($resultado);
    
    if($columnas == 1){
      
        $_SESSION['message']= 'El usuario'." ".$dato." ".'ya se encuentra registrado';
        $_SESSION['message_type'] = 'danger';
        header("location: ../superUser.php?p=1");
        $validar = false;
    }else{
        $validar = true;
    }
    return $validar;
}


    
    $repetido = repetido($correo, $conn);
   
    if($repetido == true){

    
    $text = ucwords(strtolower($nombres));
    $text2 = ucwords(strtolower($apellidos));

    $pass = password_hash($contraseña, PASSWORD_BCRYPT);
    $query = "INSERT INTO paciente VALUES ('', '$identificacion', '$text', '$text2', '$fechaNacimiento', '$sexo') ";
    $query2 = "INSERT INTO usuario VALUES('','$correo', '$pass', '', '')";
    $resultado = mysqli_query($conn, $query);
    $resultado2 = mysqli_query($conn, $query2);
    
    
    $_SESSION['messageA']= 'Usuario Agregado correctamente';
    $_SESSION['message_type'] = 'success';
    header("location: ../vista/superUser.php?p=1");

    }
   
   




?>