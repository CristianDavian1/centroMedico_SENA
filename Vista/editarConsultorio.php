<?php

include("../modelo/dataBase.php");

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $query = "SELECT * FROM consultorio  WHERE idConsultorio = '$id'";
    $resultado = mysqli_query($conn, $query);

    if(mysqli_num_rows($resultado) == 1){

        $row = mysqli_fetch_array($resultado);

        $id = $_GET['id'];
        $nombre = $row['conNombre'];
        
        
        

    }
}   


    
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vista/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../vista/iconos/ico.png" type="image/x-icon">
    <link rel="stylesheet" href="../vista/css/index.css">
    <title>Editar</title>
</head>
<body>
    <nav class="container">
        <section class="main row">
            <article class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
                <a href="../vista/index.php"><img class="iconoPrincipal" src="../vista/iconos/iconoCentroDeSalud.png" alt="logo"></a>
            </article>

            <form action="index.html" method="post" target="_blank" class="col-xs-12 col-sm-12 col-md-3"
                id="inputBusqueda">

                <input type="search" class="form-control" name="busqueda" placeholder="Datos, elementos, álbum...">
                <input type="submit" class="btn btn-outline-info" value="Buscar">

            </form>
        </section>
    </nav>

    <h1 class="container">GESTIONAR USUARIOS DEL CENTRO DE SALUD</h1>
    
        <?php if(isset($_SESSION['messageA'])){ ?>
            <div class="container p-3" id="floatAlert">
            <div class="alert alert-success alert-dismissible fade show col-3" role="alert">
              <?= $_SESSION['messageA'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>
        <?php session_unset();} ?>
    
    
    <div class="container p-3 col-md-12">
        <table class="table table-bordered">
             <tr  id="tablaUsers"> 
                <th class="bg-info border-dark" id="tablaCabeza ">Id consultorio</th>
                <th class="bg-info border-dark" id="tablaCabeza">Nombre consultorio</th>
               
                <th class="bg-success" id="tablaCabeza">✔</th>
                <th class="bg-danger" id="tablaCabeza">✘</th>
             </tr>
             <tbody>
                <?php 
                 $query = "SELECT * FROM consultorio";
                 $resultad = mysqli_query($conn, $query);

                 while($row = mysqli_fetch_array($resultad)) { ?>
                      <form action="../controlador/editarCon.php?id=<?php echo $_GET['id']; ?>" method="POST">
                      <tr id="tablaUsers">
                        <td class="bg-light border-dark" id="tablaUsers" name="idConsultorio"><?php echo $row['idConsultorio']; ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php if($row['idConsultorio']==$_GET['id']){ ?> <input name="conNombre"id="tablaUsers" class="bg-light border-dark" type="text" value=" <?php echo $row['conNombre']; ?> " ><?php } ?>  
                        <?php if($row['idConsultorio']!=$_GET['id']){ echo $row['conNombre'];}?>  </td>
                        
                        <?php if($row['idConsultorio']==$_GET['id']){ ?>
                        <td>
                            <button class="btn btn-success" name="updates" type="submit">actualizar</button>
                        </td>
                        <?php  } ?>
                        <?php if($row['idConsultorio']==$_GET['id']){ ?>
                        <td class=" border p-2 border-white" >
                            
                             <a class="btn btn-outline-danger p-1 "  href="../controlador/eliminarTareas.php?idC=<?php echo $row['idConsultorio']?>"><img src="../vista/iconos/eliminar.png" alt="eliminar" width=20></a>

                        
                        </td>
                        <?php  } ?>
                        
                        </form>
                      </tr>
                      
                <?php } ?>
             </tbody>
        </table>
    </div>
    <div class="offcanvas offcanvas-end bg-info" tabindex="-1" id="offcanvasNavbar"
        aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title bg-info">AGREGAR USUARIO</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <form action="./controlador/agregarTareas.php" method="post" class="col-md-12 col-xs-12 col-sm-12 p-1">
            <div class="offcanvas-body" class="col-md-12 col-xs-12 col-sm-12">
                NOMBRES :<input type="text" name="pacNombres" class="text-light bg-secondary" class="form-control ">
                APELLIDOS : <input type="text" name="pacApellidos" class="text-light bg-secondary" class="form-control">
                IDENTIFICACION : <input type="text" name="pacIdentificacion" class="text-light bg-secondary" class="form-contol">
                FECHA DE NACIMIENTO : <input type="date" name="pacFechaNacimiento" class="text-light bg-secondary"
                    value="2018-07-22" min="2010-01-01" max="2025-12-31">
                <p>
                    SEXO :
                    <input type="radio" name="pacSexo" value="masculino" /> masculino
                    <input type="radio" name="pacSexo" value="femenino" /> femenino
                    <input type="radio" name="pacSexo" value="No se sabe" /> No definido
                </p>
                CORREO ELECTRONICO : <input type="text" name="usuLogin" class="text-light bg-secondary"
                    class="form-control">
                CREAR CONTRASEÑA : <input type="text" name="usuPassword" class="text-light bg-secondary"
                    class="form-control">
                <input type="submit" name="enviar" class="btn btn-outline-success me-2" type="button" class="navbar-toggler"
                    type="button" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <button class="btn btn-outline-success me-2 p-1" type="button" class="navbar-toggler" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                    aria-controls="offcanvasNavbar">CANCELAR</button>
            </div>
        </form>




        <script src="../vista/js/jquery-3.6.0.min.map"></script>
        <script src="../vista/js/bootstrap.min.js"></script>
</body>
</html>