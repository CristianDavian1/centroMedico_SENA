<?php 
if(isset($_POST['buscarMed'])){
  
    include("../modelo/dataBase.php");
    require"../Modelo/medico.php";

    $busqueda = $_POST['busqueda'];
    
    $query="SELECT * FROM medico WHERE medIdentificacion LIKE '%$busqueda%' OR medNombres LIKE '%$busqueda%' OR medApellidos LIKE '%$busqueda%' 
                 OR medEspecialidad LIKE '%$busqueda%' OR medTelefono LIKE '%$busqueda%' OR medCorreo LIKE '%$busqueda%'";
                 $resultado = mysqli_query($conn, $query);
                 $filas = mysqli_num_rows($resultado);
      	



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
                <th class="bg-info border-dark" id="tablaCabeza">Identificacion del medico</th>
                <th class="bg-info border-dark" id="tablaCabeza">Nombres del medico </th>
                <th class="bg-info border-dark" id="tablaCabeza">Apellidos del medico</th>
                <th class="bg-info border-dark" id="tablaCabeza">especialidad</th>
                <th class="bg-info border-dark" id="tablaCabeza">telefono</th>
                <th class="bg-info border-dark" id="tablaCabeza">Correo</th>
                <th class="bg-success" id="tablaCabeza">✔</th>
                <th class="bg-danger" id="tablaCabeza">✘</th>
             </tr>
             <tbody>
              
                 
                 <?php 
               
                  
                 while($row = mysqli_fetch_array($resultado)) { ?>
                      
                      <tr id="tablaUsers">
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['idMedico'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['medIdentificacion'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['medNombres'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['medApellidos'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['medEspecialidad'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['medTelefono'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['medCorreo'] ?></td>
                       
                        
                        <td class="border p-2 border-white ">
                            <a class="btn btn-outline-success p-1"href="../controlador/editarTareas.php?id=<?php echo $row['idMedico']?>"><img  src="../vista/iconos/editar.png" alt="editar" width=20></a>
                            
                        </td>
                        <td class=" border p-2 border-white" >
                            
                             <a onclick="eliminame" class="btn btn-outline-danger p-1 " href="../controlador/eliminarTareas.php?id=<?php echo $row['idMedico']?>"><img src="../vista/iconos/eliminar.png" alt="eliminar" width=20></a>
                            
                      </tr>
                    <script src="../vista/js/jquery-3.6.0.min.map"></script>
                    <script src="../vista/js/bootstrap.min.js"></script>
        
</body>
                <?php } ?>

      <?php }?>
      <?php  if($filas == 0 ){ echo 'nel pastel';} ?>    