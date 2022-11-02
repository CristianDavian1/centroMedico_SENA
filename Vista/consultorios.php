<?php include("../modelo/dataBase.php");?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="../vista/fontawesome/css/all.min.css">
    <link rel="shortcut icon" href="./iconos/ico.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/index.css">

    <title>Administrador</title>
</head>

<body>
    <div class="container">
        <div class="p-2">
         <button class="btn btn-outline-dark me-2" type="button" class="navbar-toggler" type="button"
            onclick="location.href='../controlador/logut.php'"><i class="fa-sharp fa-solid fa-door-open"></i>  Cerrar Session</button>
    </div>
       
    </div>
    
    <nav class="container">
        <section class="main row">
            <article class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
                <a href="./index.php"><img class="iconoPrincipal" src="./iconos/iconoCentroDeSalud.png" alt="logo"></a>
            </article>
             
            
            <form action="../vista/buscarConsultorio.php" method="post"  class="col-xs-12 col-sm-12 col-md-3"
                id="inputBusqueda">  <h5>BUSCAR DATOS DE CONSULTORIO</h5>

                <input type="search" class="form-control" name="busqueda" placeholder="Datos de medico, id, identificacion">
                <input type="submit" class="btn btn-outline-info" value="buscar" name="buscarCon">

            </form>
           
        </section>
    </nav>

    <h5 class="container">GESTIONAR CONSULTORIOS DEL CENTRO DE SALUD</h5>
        <?php session_start(); ?>
        <?php if(isset($_SESSION['message'])){ ?>
            <div class="container p-3" id="floatAlert">
            <div class="alert alert-success alert-dismissible fade show col-3" role="alert">
              <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>
        <?php session_unset();} ?>
        <?php if(isset($_SESSION['messageA'])){ ?>
            <div class="container p-3" id="floatAlert">
            <div class="alert alert-danger alert-dismissible fade show col-3" role="alert">
              <?= $_SESSION['messageA'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>
        <?php session_unset();} ?>
        
    <div class="container text-center p-3">
  <div class="row">
    <div class="col-md-3">
      <button class="btn btn-outline-warning me-2" type="button" class="navbar-toggler" type="button"
            data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"><i class="fa-solid fa-house-chimney-medical"></i> Agregar consultorio</button>
    </div>
    <div class="col-md-3">
    <button class="btn btn-outline-success me-2" type="button" class="navbar-toggler" type="button"
            onclick="location.href='../vista/superUser.php?p=1'"><i class="fa-solid fa-users"></i>   Gestionar usuarios</button>
    </div>
    <div class="col-md-3">
    <button class="btn btn-outline-success me-2" type="button" class="navbar-toggler" type="button"
            onclick="location.href='../vista/medicos.php?m=1'"><i class="fa-sharp fa-solid fa-user-nurse"></i>   Gestionar medicos</button>
    </div>
    <div class="col-md-3">
        <button class="btn btn-outline-success me-2" type="button" class="navbar-toggler" type="button"
            onclick="location.href='../vista/citas.php?citas=1'">Citas</button>
    </div>
    
  </div>
</div>
    <div class="container p-3 col-md-12">
        <table class="table table-bordered">
             <tr  id="tablamedicos"> 
                <th class="bg-warning border-dark p-1" id="tablaCabeza ">Id consultorio</th>
                <th class="bg-warning border-dark p-1" id="tablaCabeza">Nombre consultorio</th>
               
                
                <th class="bg-success" id="tablaCabeza">✔</th>
                <th class="bg-danger" id="tablaCabeza">✘</th>
             </tr>
             <tbody>
                
                <?php 
                $porPagina=9;
                 
                if(!$_GET['c']) {
                    
                   
                   header("location: ../vista/consultorios.php?c=1");
                  
                }  
                   $pagina = $_GET['c'];
                   $inicio = ($pagina-1)*$porPagina;
                   
                ?>
                
                 
                 <?php 
                 $query = "SELECT * FROM consultorio LIMIT $inicio,$porPagina";
                 $resultado = mysqli_query($conn, $query);
                 
            
                 while($row = mysqli_fetch_array($resultado)) { ?>
                      
                      <tr id="tablaUsers" >
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['idConsultorio'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['conNombre'] ?></td>
                        
                        
                        
                        <td class="border p-1 border-white ">
                            <a class="btn btn-outline-success p-1"href="../vista/editarConsultorio.php?id=<?php echo $row['idConsultorio']?>"><img  src="../vista/iconos/editar.png" alt="editar" width=20></a>
                            
                        </td>
                        <td class=" border p-1 border-white" >
                            
                             <a onclick="eliminame" class="btn btn-outline-danger p-1 " href="../controlador/agregarCon.php?idC=<?php echo $row['idConsultorio']?>"><img src="../vista/iconos/eliminar.png" alt="eliminar" width=20></a>
                            
                      </tr>
                    
                    
                     
                <?php } ?>
                <?php  
                $query = "SELECT * FROM consultorio";
                $resultado = mysqli_query($conn, $query);

                $total = mysqli_num_rows($resultado);
                 
                $totalP = ceil($total/$porPagina);
                
                
                ?> 
                 <nav aria-label="Page navigation example">
                      <ul class="pagination pagination-sm"> 
                      <li class="page-item active" aria-current="page">
                        
                       </li>
                     <li class="page-item"><a class="page-link" href="../vista/consultorios.php?c=1">1</a></li>
                    <?php for($i=2;$i<=$totalP;$i++){?>
                      
                     <li class="page-item"><a class="page-link" href="../vista/consultorios.php?c=<?php echo $i?>"><?php echo $i?></a></li>
                     

                    <?php }  ?>
                     
                   </ul>
                   
                 </nav>
             </tbody>
        </table>
    </div>
    
    <div class="offcanvas offcanvas-end bg-info" tabindex="-1" id="offcanvasNavbar"
        aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title bg-info">AGREGAR MEDICO</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <form action="../controlador/agregarCon.php" method="post" class="col-md-12 col-xs-12 col-sm-12 p-1">
            <div class="offcanvas-body" class="col-md-12 col-xs-12 col-sm-12">
              <?php $persona = ''; ?>

                NOMBRE DEL NUEVO CONSULTORIO : <input type="text" name="conNombre" class="text-light bg-secondary p-2" class="form-control" required="" pattern="[A-Za-z]{4-20}">             
                    
                <input type="submit" name="enviar" class="btn btn-outline-success me-2" type="button" class="navbar-toggler"
                    type="button" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" required="">
               
                <button class="btn btn-outline-success me-2 p-1" type="button" class="navbar-toggler" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" name="cancelar"
                    aria-controls="offcanvasNavbar">CANCELAR</button>
                  
            </div>
            <?php if(isset($_SESSION['validacion'])){ ?>
            <div class="container p-1"id="floatAlertError">
            <div class="alert alert-danger alert-dismissible fade show col-3" role="alert">
              <?= $_SESSION['validacion'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>
        <?php session_unset();} ?>
        </form>



        <script src="../vista/fotawesome/js/all.min.js"></script>
        <script src="../vista/js/jquery-3.6.0.min.map"></script>
        <script src="../vista/js/bootstrap.min.js"></script>
        
</body>
</body>

</html>