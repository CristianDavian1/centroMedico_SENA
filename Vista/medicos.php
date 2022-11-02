<?php include("../modelo/dataBase.php");?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../vista/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vista/fontawesome/css/all.min.css">
    <link rel="shortcut icon" href="../vista/iconos/ico.png" type="image/x-icon">
    <link rel="stylesheet" href="../vista/css/index.css">

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
             
            
            <form action="../controlador/buscarMedico.php" method="post"  class="col-xs-12 col-sm-12 col-md-3"
                id="inputBusqueda">  <h5>BUSCAR DATOS DE MEDICO</h5>

                <input type="search" class="form-control" name="busqueda" placeholder="Datos de medico, id, identificacion">
                <input type="submit" class="btn btn-outline-info" value="buscar" name="buscarMed">

            </form>
           
        </section>
    </nav>

    <h5 class="container">GESTIONAR MEDICOS DEL CENTRO DE SALUD</h5>
     
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
            <div class="alert alert-success alert-dismissible fade show col-3" role="alert">
              <?= $_SESSION['messageA'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>
        <?php session_unset();} ?>
        

    <div class="container text-center p-3">
  <div class="row">
    <div class="col-md-3">
      <button class="btn btn-outline-secondary me-2" type="button" class="navbar-toggler" type="button"
            data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"><i class="fa-sharp fa-solid fa-user-plus"></i> Agregar
            medico</button>
    </div>
    <div class="col-md-3">
    <button class="btn btn-outline-success me-2" type="button" class="navbar-toggler" type="button"
            onclick="location.href='../vista/superUser.php?p=1'"><i class="fa-solid fa-users"></i>   Gestionar usuarios</button>
    </div>
    <div class="col-md-3">
        <button class="btn btn-outline-success me-2" type="button" class="navbar-toggler" type="button"
            onclick="location.href='../vista/consultorios.php'"><i class="fa-solid fa-hospital"></i>  Gestionar consultorios</button>
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
                <th class="bg-secondary border-dark" id="tablaCabeza ">Id</th>
                <th class="bg-secondary border-dark" id="tablaCabeza">Identificacion del medico</th>
                <th class="bg-secondary border-dark" id="tablaCabeza">Nombres del medico </th>
                <th class="bg-secondary border-dark" id="tablaCabeza">Apellidos del medico</th>
                <th class="bg-secondary border-dark" id="tablaCabeza">especialidad</th>
                <th class="bg-secondary border-dark" id="tablaCabeza">telefono</th>
                <th class="bg-secondary border-dark" id="tablaCabeza">Correo</th>
                
                <th class="bg-success" id="tablaCabeza">✔</th>
                <th class="bg-danger" id="tablaCabeza">✘</th>
             </tr>
             <tbody>
                
                <?php 
                $porPagina=9;
                 
                if(!$_GET['m']) {
                    
                   
                   header("location: ../vista/medicos.php?m=1");
                  
                }  
                   $pagina = $_GET['m'];
                   $inicio = ($pagina-1)*$porPagina;
                   
                ?>
                
                 
                 <?php 
                 $query = "SELECT * FROM medico LIMIT $inicio,$porPagina";
                 $resultado = mysqli_query($conn, $query);
                 
            
                 while($row = mysqli_fetch_array($resultado)) { ?>
                      
                      <tr id="tablaUsers" >
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['idMedico'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['medIdentificacion'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['medNombres'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['medApellidos'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['medEspecialidad'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['medTelefono'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['medCorreo'] ?></td>
                        
                        
                        <td class="border p-2 border-white ">
                            <a class="btn btn-outline-success p-1"href="../controlador/editarMedico.php?idM=<?php echo $row['idMedico']?>"><img  src="../vista/iconos/editar.png" alt="editar" width=20></a>
                            
                        </td>
                        <td class=" border p-2 border-white" >
                            
                             <a onclick="eliminame" class="btn btn-outline-danger p-1 " href="../controlador/eliminarTareas.php?idM=<?php echo $row['idMedico']?>"><img src="../vista/iconos/eliminar.png" alt="eliminar" width=20></a>
                            
                      </tr>
                    
                    
                     
                <?php } ?>
                <?php  
                $query = "SELECT * FROM paciente p JOIN usuario u ON p.idPaciente=u.idUsuario";
                $resultado = mysqli_query($conn, $query);

                $total = mysqli_num_rows($resultado);
                 
                $totalP = ceil($total/$porPagina);
                
                
                ?> 
                 <nav aria-label="Page navigation example">
                      <ul class="pagination pagination-sm"> 
                      <li class="page-item active" aria-current="page">
                        
                       </li>
                     <li class="page-item"><a class="page-link" href="../vista/superUser.php?p=1">1</a></li>
                    <?php for($i=2;$i<=$totalP;$i++){?>
                      
                     <li class="page-item"><a class="page-link" href="../vista/superUser.php?p=<?php echo $i?>"><?php echo $i?></a></li>
                     

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
        <form action="../controlador/agregarMedico.php" method="post" class="col-md-12 col-xs-12 col-sm-12 p-1">
            <div class="offcanvas-body" class="col-md-12 col-xs-12 col-sm-12">
              <?php $persona = ''; ?>
                IDENTIFICACION :<input type="text" name="medIdentificacion" class="text-light bg-secondary" class="form-control" value=" <?php $persona; ?>" required="" pattern="{4-20}">
                NOMBRES : <input type="text" name="medNombres" class="text-light bg-secondary" class="form-control" required="" pattern="[A-Za-z]{4-20}"> 
                APELLIDOS : <input type="text" name="medApellidos" class="text-light bg-secondary" class="form-contol" required="">
                
                ESPECIALIDAD : <input type="text" name="medEspecialidad" class="text-light bg-secondary"
                    class="form-control" required="">
                TELEFONO : <input type="text" name="medTelefono" class="text-light bg-secondary"
                    class="form-control" required="">   
                CORREO ELECTRONICO : <input type="text" name="medCorreo" class="text-light bg-secondary"
                    class="form-control" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,10}$" > 
               
                  
                
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