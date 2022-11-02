<?php 
if(isset($_POST['buscarCita'])){
  
    include("../modelo/dataBase.php");
    require ("../Modelo/medico.php");

    $busqueda = $_POST['busqueda'];
    
    $query="SELECT * FROM cita WHERE idCita LIKE '%$busqueda%' OR citFecha LIKE '%$busqueda%' OR citHora LIKE '%$busqueda%' 
                 OR citPaciente LIKE '%$busqueda%' OR citMedico LIKE '%$busqueda%' OR citConsultorio LIKE '%$busqueda%' 
                 OR citEstado LIKE '%$busqueda%' OR citObservaciones LIKE '%$busqueda%'";
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
               
                  
                 while($row = mysqli_fetch_array($resultado)) { ?>
                      
                      <tr id="tablaUsers">
                      <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['idCita'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['citFecha'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['citHora'] ?></td>
                
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['citPaciente'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['citMedico'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['citConsultorio'] ?></td>
                        
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['citEstado'] ?></td>
                        <td class="bg-light border-dark" id="tablaUsers"><?php echo $row['citObservaciones'] ?></td>
                       
                        
                        <td class="border p-2 border-white ">
                        <a class="btn btn-outline-success p-1"href="../controlador/agregarCita.php?editID=<?php echo $row['idCita']?>"><img  src="../vista/iconos/editar.png" alt="editar" width=20></a>                            
                        </td>
                        <td class=" border p-2 border-white" >
                            
                        <a onclick="eliminame" class="btn btn-outline-danger p-1 " href="../controlador/agregarCita.php?citID=<?php echo $row['idCita']?>"><img src="../vista/iconos/eliminar.png" alt="eliminar" width=20></a>
                            
                      </tr>
                    <script src="../vista/js/jquery-3.6.0.min.map"></script>
                    <script src="../vista/js/bootstrap.min.js"></script>
        
</body>
                <?php } ?>

      <?php }?>
      <?php  if($filas == 0 ){ echo 'nel pastel';} ?>    