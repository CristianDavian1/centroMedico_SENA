<?php
if(isset($_POST['enviarC'])){

    session_start();

    include("../modelo/dataBase.php");
    require "../Modelo/cita.php";
    
    function repetido($dato, $dato1, $conn){
        $validar;

        $query = "SELECT * FROM cita WHERE citHora = '$dato' AND citmedico = '$dato1'";
        $resultado = mysqli_query($conn, $query);
        $columnas = mysqli_num_rows($resultado);


        
        if($columnas == 1){
          
            $_SESSION['messageA']= ' no hay disponibilidad : '. $dato.
            'con el medico : '.$dato1;
            $_SESSION['message_type'] = 'danger';
            header("location: ../vista/citas.php?citas=1");

            $validar = false;
        }else{
            $validar = true;
        }
        return $validar;
    }

    $validacion = repetido($_POST['citHora'], $_POST['citMedico'], $conn);

    
    if($validacion == true){
    $objCit=New cita();
    $text = ucwords(strtolower($_POST['citObservaciones']));
    $objCit->citasN($_POST['citFecha'], $_POST['citHora'], $_POST['citPaciente'], $_POST['citMedico'],
    $_POST['citConsultorio'], $_POST['citEstado'], $text);
    $resultado=$objCit->agregarCita();
    


    if($resultado){

    $_SESSION['messageB']= ' cita asigana correctamente ';
    $_SESSION['message_type'] = 'success';
    header("location: ../vista/citas.php?citas=1");

    }else
    header("location: ../vista/citas.php?citas=1");

    }
}
if(isset($_GET['citID'])){

    session_start();
    include("../modelo/dataBase.php");
    require ("../Modelo/cita.php");

    
    $objCitD=New cita();
    $objCitD->citasD($_GET['citID']);
    $result = $objCitD->eliminarCita();

    if($result){

    $_SESSION['messageA']= ' cita : '.'#'.$_GET['citID']. ' eliminada correctamente ';
    $_SESSION['message_type'] = 'success';
    header("location: ../vista/citas.php?citas=1");

    }else

    $_SESSION['messageB']= ' no se pudo eliminar la cita : '.$_GET['citID'];
    $_SESSION['message_type'] = 'success';

    header("location: ../vista/citas.php?citas=1");

    }

    if(isset($_POST['updatesCita'])){


        session_start();
        include("../modelo/dataBase.php");
        require ("../Modelo/cita.php");
    
        extract($_POST);
        
        $objCitA=New cita();
        $objCitA->citasA($_POST['citFecha'], $_POST['citHora'], $_POST['citPaciente'], $_POST['citMedico'],
        $_POST['citConsultorio'], $_POST['citEstado'], $_POST['citObservaciones'], $_GET['id']);
        $result = $objCitA->editarCita();
    
        if($result){
    
        $_SESSION['messageA']= ' cita : '.'#'.$_GET['id']. ' actualizada ';
        $_SESSION['message_type'] = 'success';
        header("location: ../vista/citas.php?citas=1");
    
        }else
    
        $_SESSION['messageB']= ' no se pudo editar la cita : '.$_GET['id'];
        $_SESSION['message_type'] = 'success';
    
        header("location: ../vista/citas.php?citas=1");
    }



if(isset($_GET['editID'])){?>

<?php include("../modelo/dataBase.php");?>

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

    <h1 class="container">GESTIONAR CITAS DEL CENTRO DE SALUD</h1>
    
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
                 $query = "SELECT * FROM cita";
                 $resultad = mysqli_query($conn, $query);

                 while($row = mysqli_fetch_array($resultad)) { ?>
                      <form action="../controlador/agregarCita.php?id=<?php echo $_GET['editID']; ?>" method="POST">
                      <tr id="tablaUsers">
                        <td class="bg-light border-dark" id="tablaUsers" name="idCita"><?php echo $row['idCita']; ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php if($row['idCita']==$_GET['editID']){ ?> <input name="citFecha"id="tablaUsers" class="bg-light border-dark" type="text" value=" <?php echo $row['citFecha']; ?> " ><?php } ?>  
                        <?php if($row['idCita']!=$_GET['editID']){ echo $row['citFecha'];}?>  </td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php if($row['idCita']==$_GET['editID']){ ?> <input name="citHora"id="tablaUsers" class="bg-light border-dark" type="text" value=" <?php echo $row['citHora']; ?> " ><?php } ?>  
                        <?php if($row['idCita']!=$_GET['editID']){ echo $row['citHora'];}?>  </td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php if($row['idCita']==$_GET['editID']){ ?> <input name="citPaciente"id="tablaUsers" class="bg-light border-dark" type="text" value=" <?php echo $row['citPaciente']; ?> " ><?php } ?>  
                        <?php if($row['idCita']!=$_GET['editID']){ echo $row['citPaciente'];}?>  </td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php if($row['idCita']==$_GET['editID']){ ?> <input name="citMedico"id="tablaUsers" class="bg-light border-dark" type="text" value=" <?php echo $row['citMedico']; ?> " ><?php } ?>  
                        <?php if($row['idCita']!=$_GET['editID']){ echo $row['citMedico'];}?>  </td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php if($row['idCita']==$_GET['editID']){ ?> <input name="citConsultorio"id="tablaUsers" class="bg-light border-dark" type="text" value=" <?php echo $row['citConsultorio']; ?> " ><?php } ?>  
                        <?php if($row['idCita']!=$_GET['editID']){ echo $row['citConsultorio'];}?>  </td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php if($row['idCita']==$_GET['editID']){ ?> <input name="citEstado"id="tablaUsers" class="bg-light border-dark" type="text" value=" <?php echo $row['citEstado']; ?> " ><?php } ?>  
                        <?php if($row['idCita']!=$_GET['editID']){ echo $row['citEstado'];}?>  </td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php if($row['idCita']==$_GET['editID']){ ?> <input name="citObservaciones"id="tablaUsers" class="bg-light border-dark" type="text" value=" <?php echo $row['citObservaciones']; ?> " ><?php } ?>  
                        <?php if($row['idCita']!=$_GET['editID']){ echo $row['citObservaciones'];}?>  </td>
                        
                        
                        <?php if($row['idCita']==$_GET['editID']){ ?>
                        <td>
                            <button class="btn btn-success" name="updatesCita" type="submit">actualizar</button>
                        </td>
                        <?php  } ?>
                        <?php if($row['idCita']==$_GET['editID']){ ?>
                        <td class=" border p-2 border-white" >
                            
                             <a class="btn btn-outline-danger p-1 "  href="../controlador/eliminarTareas.php?idC=<?php echo $row['idCita']?>"><img src="../vista/iconos/eliminar.png" alt="eliminar" width=20></a>

                        
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

<?php } ?>
