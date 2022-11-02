<?php include("../modelo/dataBase.php");?>
<?php 

if(isset($_POST['go'])){

    $usuarios = $_POST['usuLogin'];
    $password = $_POST['usuPassword'];
    
    $_SESSION['usuario']= $usuarios;

     $validar = $_SESSION['usuario'];
         
            if($validar == null || $validar = ''){

            header("location: ../vista/usuarios.php?errorDeDatos");
            }
if(empty($usuario) and empty($password)){
       

       header("location: ../vista/usuarios.php?errorDeDatos");
      
    }
    else{
    
        $query = "SELECT * FROM usuario WHERE usuLogin ='$usuarios'";
        $resulta = mysqli_query($conn, $query);
        $filas = mysqli_num_rows($resulta);
        $buscar = mysqli_fetch_array($resulta);
        
        }
           
    
    if($filas==1 and password_verify($password, $buscar['usuPassword'])){

           
           header("location: ../vista/superUser.php?p=1");
 

    }else{
           
        header("location: ../vista/usuarios.php?errorDeDatos");
        
    }
    
}



?>