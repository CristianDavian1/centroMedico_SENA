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
        <div class="w-7 p-2" >
        <button class="btn btn-outline-dark me-2" type="button" class="navbar-toggler" type="button"
            onclick="location.href='../controlador/logut.php'">CITAS</button>
        </div>
    </div>
    
    <nav class="container">
        <section class="main row">
            <article class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
                <a href="./index.php"><img class="iconoPrincipal" src="./iconos/iconoCentroDeSalud.png" alt="logo"></a>
            </article>
             
            
            <form action="../vista/buscarCita.php" method="post"  class="col-xs-12 col-sm-12 col-md-3"
                id="inputBusqueda">  <h5>BUSCAR DATOS DE CITA</h5>

                <input type="search" class="form-control" name="busqueda" placeholder="Datos de medico, id, identificacion">
                <input type="submit" class="btn btn-outline-info" value="buscarCita" name="buscarCita">

            </form>
           
        </section>
    </nav>

    <h5 class="container">GESTIONAR CITAS DEL CENTRO DE SALUD</h5>
    
        <?php session_start();?>
        <?php if(isset($_SESSION['messageA'])){ ?>
            <div class="container p-3" id="floatAlert">
            <div class="alert alert-success alert-dismissible fade show col-3" role="alert">
            <?= $_SESSION['messageA'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>
        <?php session_unset();} ?>
        <?php if(isset($_SESSION['messageB'])){ ?>
            <div class="container p-3" id="floatAlert">
            <div class="alert alert-success alert-dismissible fade show col-3" role="alert">
            <?= $_SESSION['messageB'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>
        <?php session_unset();} ?>

    <div class="container text-center p-3">
  <div class="row">
    <div class="col-md-3">
      <button class="btn btn-outline-warning me-2" type="button" class="navbar-toggler" type="button"
            data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"><i class="fa-solid fa-file-circle-plus"></i> Agregar cita</button>
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
            onclick="location.href='../vista/consultorios.php?c=1'"> <i class="fa-solid fa-hospital"></i>  Gestionar consultorios</button>
    </div>
    
  </div>
</div>
    <div class="container p-3 col-md-12">
        <table class="table table-bordered">
             <tr  id="tablamedicos"> 
                <th class="bg-warning border-dark p-1" id="tablaCabeza ">Cita ID</th>
                <th class="bg-warning border-dark p-1" id="tablaCabeza">Fecha de la cita</th>
                <th class="bg-warning border-dark p-1" id="tablaCabeza ">Hora de la cita</th>
                <th class="bg-warning border-dark p-1" id="tablaCabeza">paciente</th>
                <th class="bg-warning border-dark p-1" id="tablaCabeza ">Medico</th>
                <th class="bg-warning border-dark p-1" id="tablaCabeza">Consultorio</th>
                <th class="bg-warning border-dark p-1" id="tablaCabeza ">Estado</th>
                <th class="bg-warning border-dark p-1" id="tablaCabeza">Observaciones</th>
                
                <th class="bg-success" id="tablaCabeza">✔</th>
                <th class="bg-danger" id="tablaCabeza">✘</th>
             </tr>
             <tbody>
                
                <?php 
                $porPagina=9;
                 
                if(!$_GET['citas']) {
                    
                   
                   header("location: ../vista/citas.php?citas=1");
                  
                }  
                   $pagina = $_GET['citas'];
                   $inicio = ($pagina-1)*$porPagina;
                   
                ?>
                
                 
                 <?php 
                 $query = "SELECT * FROM cita
                 LIMIT $inicio,$porPagina";
                 
                 
                 $resultado = mysqli_query($conn, $query);
                 
            
                 while($row = mysqli_fetch_array($resultado)) { ?>
                      
                      <tr id="tablaUsers" >
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['idCita'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['citFecha'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['citHora'] ?></td>
                
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['citPaciente'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['citMedico'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['citConsultorio'] ?></td>
                        
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['citEstado'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['citObservaciones'] ?></td>
                        <td class="border p-1 border-white ">
                            <a class="btn btn-outline-success p-1"href="../controlador/agregarCita.php?editID=<?php echo $row['idCita']?>"><img  src="../vista/iconos/editar.png" alt="editar" width=20></a>
                            
                        </td>
                        <td class=" border p-1 border-white" >
                            
                             <a onclick="eliminame" class="btn btn-outline-danger p-1 " href="../controlador/agregarCita.php?citID=<?php echo $row['idCita']?>"><img src="../vista/iconos/eliminar.png" alt="eliminar" width=20></a>
                            
                      </tr>
                    
                    
                     
                <?php } ?>
                <?php  
                $query = "SELECT * FROM cita";
                $resultado = mysqli_query($conn, $query);

                $total = mysqli_num_rows($resultado);
                 
                $totalP = ceil($total/$porPagina);
                
                
                ?> 
                 <nav aria-label="Page navigation example">
                      <ul class="pagination pagination-sm"> 
                      <li class="page-item active" aria-current="page">
                        
                       </li>
                     <li class="page-item"><a class="page-link" href="../vista/citas.php?citas=1">1</a></li>
                    <?php for($i=2;$i<=$totalP;$i++){?>
                      
                     <li class="page-item"><a class="page-link" href="../vista/citas.php?citas=<?php echo $i?>"><?php echo $i?></a></li>
                     

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


        <form action="../controlador/agregarCita.php" method="post" class="col-md-12 col-xs-12 col-sm-12 p-1">
            <div class="offcanvas-body" class="col-md-12 col-xs-12 col-sm-12">
              

                FECHA : <input type="date" name='citFecha' require=''>  <br> 
                HORA : <input type="time" name='citHora' require=''>  <br>

                <?php $query = "SELECT * FROM paciente ";
                $result = mysqli_query($conn, $query); ?>

                PECIENTE : <label for="lang"></label>
                <select name="citPaciente" id="lang">
                <?php while($row = mysqli_fetch_array($result)) {?>

                <option value=" <?php echo $row['idPaciente'];?> ">  
                <?php echo 'CC '.$row['pacIdentificacion'].'-'.$row['pacNombres'].' '.$row['pacApellidos']; ?>
                </option>
               
                <?php } ?>
                </select>

                <?php $query = "SELECT * FROM medico ";
                $result = mysqli_query($conn, $query); ?>

                MEDICO : <label for="lang"></label>
                <select name="citMedico" id="lang">
                <?php while($row = mysqli_fetch_array($result)) {?>

                <option value=" <?php echo $row['idMedico'];?> ">  
                <?php echo $row['medNombres'].' '.$row['medApellidos'] ?>
                </option>

                <?php } ?>
                </select>

                <?php $query = "SELECT * FROM consultorio ";
                $result = mysqli_query($conn, $query); ?>

                CONSULTORIO : <label for="lang"></label>
                <select name="citConsultorio" id="lang">
                <?php while($row = mysqli_fetch_array($result)) {?>

                <option value=" <?php echo $row['idConsultorio'];?> ">  
                <?php echo $row['conNombre']; ?>
                </option>
               
                <?php } ?>
                </select>
                <p>
                ESTADO : 
                <input type="radio" name="citEstado" value="asignado"/> asignado
                <input type="radio" name="citEstado" value="atendido"/> atendido
                </p>

                OBSERVACIONES : <input type="text" name='citObservaciones' placeholder="Escribe aqui...">     
                
                



                <input type="submit" name="enviarC" class="btn btn-outline-success me-2" type="button" class="navbar-toggler"
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