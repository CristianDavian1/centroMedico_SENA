
<?php 

include("../modelo/dataBase.php");

if(isset($_POST['buscar'])){

    $busqueda = $_POST['busqueda'];

    
    $query = "SELECT * FROM paciente p JOIN usuario u ON p.idPaciente=u.idUsuario WHERE pacApellidos LIKE '%$busqueda%' OR pacFechaNacimiento LIKE '%$busqueda%' OR pacIdentificacion LIKE '%$busqueda%' 
    OR pacNombres LIKE '%$busqueda%' OR pacSexo LIKE '%$busqueda%'";
    $result = mysqli_query($conn, $query);
    $filas = mysqli_num_rows($result);
    

    }?>

   <?php  if($filas >= 1 ){ ?>
     
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../vista/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../vista/iconos/ico.png" type="image/x-icon">
    <link rel="stylesheet" href="../vista/css/index.css">

    <title>Busqueda</title>
</head>

<body>

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
                 $query = "SELECT * FROM paciente p JOIN usuario u ON p.idPaciente=u.idUsuario WHERE pacApellidos LIKE '%$busqueda%' OR pacFechaNacimiento LIKE '%$busqueda%' OR pacIdentificacion LIKE '%$busqueda%' 
                 OR pacNombres LIKE '%$busqueda%' OR pacSexo LIKE '%$busqueda%'";
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
                        <td class="bg-light border-dark" id="contraseña" id="tablaUsers"><?php echo substr($row['usuPassword'], 0, 30)."...."?></td>
                        
                        <td class="border p-2 border-white ">
                            <a class="btn btn-outline-success p-1"href="../controlador/editarTareas.php?id=<?php echo $row['idPaciente']?>"><img  src="../vista/iconos/editar.png" alt="editar" width=20></a>
                            
                        </td>
                        <td class=" border p-2 border-white" >
                            
                             <a onclick="eliminame" class="btn btn-outline-danger p-1 " href="../controlador/eliminarTareas.php?id=<?php echo $row['idPaciente']?>"><img src="../vista/iconos/eliminar.png" alt="eliminar" width=20></a>
                            
                      </tr>
                    <script src="../vista/js/jquery-3.6.0.min.map"></script>
                    <script src="../vista/js/bootstrap.min.js"></script>
        
</body>
                <?php } ?>

      <?php }?>
      <?php  if($filas == 0 ){

        $_SESSION['messageA']= 'no se encontro ningun regultado para : '." ".$busqueda;
        $_SESSION['message_type'] = 'danger';
        header("location: ../vista/superUser.php?p=1");

       }?>

<?php 

   if($filas == 0 ){

    $_SESSION['messageA']= 'no se encontro ningun regultado para : '." ".$busqueda;
    $_SESSION['message_type'] = 'danger';
    header("location: ../vista/superUser.php?p=1");

   }?>

<?php 

if(isset($_POST['buscarMed'])){
  
    header("location: ../vista/medicos.php?m=1");

    $busqueda = $_POST['busqueda'];

    $this->Conexion=$conn;
		$query="SELECT * FROM medico WHERE medIdentificacion LIKE '%$busqueda%' OR medNombres LIKE '%$busqueda%' OR medApellidos LIKE '%$busqueda%' 
		OR medEspecialidad LIKE '%$busqueda%' OR medTelefono LIKE '%$busqueda%' OR medCorreo LIKE '%$busqueda%';";
		$resultado=$this->Conexion->query($query);
		$this->Conexion->close();
		return $resultado;	

  

}



?>





