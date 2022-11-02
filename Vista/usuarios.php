<?php include("../modelo/dataBase.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../vista/iconos/ico.png" type="image/x-icon">
    <link rel="stylesheet" href="../vista/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vista/css/usuarios.css">
    <title>iniciar sesion</title>
</head>
<body>
    <section>
    <video autoplay="autoplay" loop ="auto" id="video_background" preload="auto" onloadedmetadata="this.muted=true">
    <source src="./videos/backGroundInicioSesion.mp4" type="video/mp4">
    </video>
    </section>
    <?php if(isset($_GET['errorDeDatos'])){ ?>
    <div class="alert alert-danger alert-dismissible fade show" id="alertLogin" role="alert">
     <strong>Error al ingresar los datos!</strong> Por favorverifica que tus datos son correctos, 
     los campos se encuentran vacios, o cuenta con un caracter no permitido.
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
    <?php } ?>
    <form id="login" action="../controlador/singUp.php" method="post" >
        <img src="./iconos/userLogin.png" alt="inicio de sesion">
        <h1>INGRESAR</h1>
        <div class="inset">
            <p>
                <label for="email">usuario</label>
                <input type="text" name="usuLogin" id="email">
            </p>
            <p>
                <label for="password">contraseña</label>
                <input type="password" name="usuPassword" id="password">
            </p>
            <p>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Recordar siempre mi contraseña</label>
            </p>
        </div>
        <p class="p-container p-2">
            <a href="https://support.google.com/accounts/answer/41078?hl=es-419&co=GENIE.Platform%3DAndroid" class="col-6">olvide mi contraseña</a>
            <a href="" class="col-6">Registrarme</a>
            


            <input type="submit" name="go" id="go" value="Log in">
        </p>
    </form>
    <script src="../js/jquery-3.6.0.min.map"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>