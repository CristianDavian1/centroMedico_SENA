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
    <link rel="stylesheet" href="../vista/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../vista/css/index.css">
    
    
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
             
            
            <form action="../controlador/buscarUser.php" method="post"  class="col-xs-12 col-sm-12 col-md-3"
                id="inputBusqueda">  <h5>BUSCAR DATOS DE USUARIO</h5>

                <input type="search" class="form-control" name="busqueda" placeholder="Datos de usuario, id, identificacion">
                <input type="submit" class="btn btn-outline-info" value="buscar" name="buscar">

            </form>
           <?php if(isset($_POST['buscar'])){ echo $_POST['buscar']; }?>
        </section>
    </nav>

    <h5 class="container">GESTIONAR USUARIOS DEL CENTRO DE SALUD</h5>
     
        <?php session_start(); ?>
    
        <?php if(isset($_SESSION['message'])){ ?>
            <div class="container p-3" id="floatAlert">
            <div class="alert alert-danger alert-dismissible fade show col-3" role="alert">
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
      <button class="btn btn-outline-info me-2" type="button" class="navbar-toggler" type="button"
            data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"><i class="fa-sharp fa-solid fa-user-plus"></i>  Agregar
            usuario</button>
    </div>
    <div class="col-md-3">
    <button class="btn btn-outline-success me-2" type="button" class="navbar-toggler" type="button"
            onclick="location.href='../vista/medicos.php?m=1'"><i class="fa-sharp fa-solid fa-user-nurse"></i>  Gestionar medicos</button>
    </div>
    <div class="col-md-3">
    <button class="btn btn-outline-success me-2" type="button" class="navbar-toggler" type="button"
            onclick="location.href='../vista/consultorios.php?c=1'"> <i class="fa-solid fa-hospital"></i>  Gestionar consultorios</button>
    </div>
    <div class="col-md-3">
        <button class="btn btn-outline-success me-2" type="button" class="navbar-toggler" type="button"
            onclick="location.href='../vista/citas.php?citas=1'">Citas</button>
    </div>
    </div>
    <div class="container p-3 col-md-12">
        <table class="table table-bordered">
             <tr  id="tablaUsers"> 
                <th class="bg-info border-dark" id="tablaCabeza ">Id</th>
                <th class="bg-info border-dark" id="tablaCabeza">Identificacion del paciente</th>
                <th class="bg-info border-dark" id="tablaCabeza">Nombres del paciente </th>
                <th class="bg-info border-dark" id="tablaCabeza">Apellidos del paciente</th>
                <th class="bg-info border-dark" id="tablaCabeza">Fecha de nacimiento</th>
                <th class="bg-info border-dark" id="tablaCabeza">Sexo</th>
                <th class="bg-info border-dark" id="tablaCabeza">Correo </th>
                <th class="bg-info border-dark" id="tablaCabeza">Contraseña</th>
                <th class="bg-success" id="tablaCabeza">✔</th>
                <th class="bg-danger" id="tablaCabeza">✘</th>
             </tr>
             <tbody>
                
                <?php 
                $porPagina=9;
                 
                if(!$_GET['p']) {
                    
                   
                   header("location: ../vista/superUser.php?p=1");
                  
                }  
                   $pagina = $_GET['p'];
                   $inicio = ($pagina-1)*$porPagina;
                   
                ?>
                
                 
                 <?php 
                 $query = "SELECT * FROM paciente p JOIN usuario u ON p.idPaciente=u.idUsuario LIMIT $inicio,$porPagina;";
                 $resultado = mysqli_query($conn, $query);
                 
            
                 while($row = mysqli_fetch_array($resultado)) { ?>
                      
                      <tr id="tablaUsers">
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['idPaciente'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['pacIdentificacion'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['pacNombres'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['pacApellidos'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['pacFechaNacimiento'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['pacSexo'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['usuLogin'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo substr($row['usuPassword'], 0, 30)."...." ?></td>
                        
                        <td class="border p-2 border-white ">
                            <a class="btn btn-outline-success p-1" href="../controlador/editarTareas.php?id=<?php echo $row['idPaciente']?>"><img src="./iconos/editar.png" alt="editar" width=20></a>
                            
                        </td>
                        <td class=" border p-2 border-white" >

                             <a class="btn btn-outline-danger p-1 "  href="../controlador/eliminarTareas.php?id=<?php echo $row['idPaciente']?>"><img  src="./iconos/eliminar.png" alt="eliminar" width=20></a>
                             
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
            <h5 class="offcanvas-title bg-info">AGREGAR USUARIO</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <form action="../controlador/agregarTareas.php" method="post" class="col-md-12 col-xs-12 col-sm-12 p-1">
            <div class="offcanvas-body" class="col-md-12 col-xs-12 col-sm-12">
              <?php $persona = ''; ?>
                NOMBRES :<input type="text" name="pacNombres" class="text-light bg-secondary" class="form-control" value=" <?php $persona; ?>" required="" pattern="[A-Za-z]{4-20}">
                APELLIDOS : <input type="text" name="pacApellidos" class="text-light bg-secondary" class="form-control" required="" pattern="[A-Za-z]{4-20}"> 
                IDENTIFICACION : <input type="text" name="pacIdentificacion" class="text-light bg-secondary" class="form-contol" required="" pattern="[0-9]+">
                FECHA DE NACIMIENTO : <input type="date" name="pacFechaNacimiento" class="text-light bg-secondary"
                    value="2018-07-22" min="2010-01-01" max="2025-12-31">
                <p>
                    SEXO :
                    <input type="radio" name="pacSexo" value="masculino"  /> masculino
                    <input type="radio" name="pacSexo" value="femenino" /> femenino
                    <input type="radio" name="pacSexo" value="No se sabe" /> No definido
                </p>
                CORREO ELECTRONICO : <input type="text" name="usuLogin" class="text-light bg-secondary"
                    class="form-control" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,10}$" > 
                CREAR CONTRASEÑA : <input type="text" name="usuPassword" class="text-light bg-secondary"
                    class="form-control" required="">
                  
                
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
          
        <script src="../vista/js/jquery-3.6.1.min.js"></script>
        
        <script src="../vista/fotawesome/js/all.min.js"></script>
        <script src="../vista/js/bootstrap.min.js"></script>
        
</body>


</html>