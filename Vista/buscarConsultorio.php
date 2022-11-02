<?php 
if(isset($_POST['buscarCon'])){
  
    include("../modelo/dataBase.php");
  
    $busqueda = $_POST['busqueda'];
    
    $query="SELECT * FROM consultorio WHERE idConsultorio LIKE '%$busqueda%' OR conNombre LIKE '%$busqueda%'";
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
                <th class="bg-info border-dark" id="tablaCabeza ">Id consultorio</th>
                <th class="bg-info border-dark" id="tablaCabeza">Nombre consultorio</th>
                
                <th class="bg-success" id="tablaCabeza">✔</th>
                <th class="bg-danger" id="tablaCabeza">✘</th>
             </tr>
             <tbody>
              
                 
                 <?php 
               
                  
                 while($row = mysqli_fetch_array($resultado)) { ?>
                      
                      <tr id="tablaUsers">
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['idConsultorio'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['conNombre'] ?></td>
                        
                       
                        
                        <td class="border p-2 border-white ">
                            <a class="btn btn-outline-success p-1"href="../controlador/editarTareas.php?id=<?php echo $row['idConsultorio']?>"><img  src="../vista/iconos/editar.png" alt="editar" width=20></a>
                            
                        </td>
                        <td class=" border p-2 border-white" >
                            
                             <a onclick="eliminame" class="btn btn-outline-danger p-1 " href="../controlador/eliminarTareas.php?id=<?php echo $row['idConsultorio']?>"><img src="../vista/iconos/eliminar.png" alt="eliminar" width=20></a>
                            
                      </tr>
                    <script src="../vista/js/jquery-3.6.0.min.map"></script>
                    <script src="../vista/js/bootstrap.min.js"></script>
        
</body>
                <?php } ?>

      <?php }?>
      <?php  if($filas == 0 ){ echo 'nel pastel';} ?>    