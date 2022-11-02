
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="../vista/iconos/ico.png" type="image/x-icon">
  <link rel="stylesheet" href="../vista/css/bootstrap.min.css">
  <link rel="stylesheet" href="../vista/css/index.css">
  <link rel="stylesheet" href="../vista/css/usuarios.css">
  <title>HealthCare</title>
</head>
<?php if(isset($_GET['inicio_session'])){ ?>
    <div class="alert alert-success alert-dismissible fade show" id="alertLoginUser" role="alert">
     <strong>Bienvenido compa!</strong> <?php ?>
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
    <?php } ?>
<aside class="redesSociales">
  <section >
    <a href=""><img class="redesSociales" src="./iconos/facebook.png" alt="facebook"></a>
    <a href=""><img class="redesSociales" src="./iconos/twotter.png" alt="twitter"></a>
    <a href=""><img class="redesSociales" src="./iconos/whatsapp.png" alt="whatsapp"></a>
    <a href=""><img class="redesSociales" src="./iconos/instagram.png" alt="instagram"></a>
    <a href=""><img class="redesSociales" src="./iconos/youtube.png" alt="youtube"></a>
  </section>
</aside>

<body>
  <nav class="container">
    <section class="main row">
      <article class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
        <a href="./index.php"><img class="iconoPrincipal" src="./iconos/iconoCentroDeSalud.png" alt="logo"></a>
      </article>

      <form action="index.html" method="post" target="_blank" class="col-xs-12 col-sm-12 col-md-3" id="inputBusqueda">

        <input type="search" class="form-control" name="busqueda" placeholder="Datos, elementos, álbum...">
        <input type="submit" class="btn btn-outline-info" value="Buscar">

      </form>
    </section>
  </nav>
  <header class="container-fluid">
    <div class="container" >
      <section class="main row">
        <div class="col-xs-12 col-sm-12 col-md-6 w-10 p-3">
          <a href="./citas.html"> <button class="btn btn-primary">CITAS</button></a>
          <a href="./ips.html"> <button class="btn btn-primary">IPS</button></a>
          <a href="./usuarios.php"> <button class="btn btn-primary">USUARIOS</button></a>
          <a href="./PQRS.html"> <button class="btn btn-primary">PQRS</button></a>
        </div>
      </section>
    </div>
  </header>
  <main class="container col-md-10 w-10 p-5">
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
          <img id="slider" src="./imagenes/presentacion1.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>SALUD DE CALIDAD</h5>
            <p>Servicio especializadoel salud de la mejor calidad </p>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img id="slider" src="./imagenes/presentacion2.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>PROFESIONALES OPTIMOS</h5>
            <p>Contamos con los mejores profesionales a su disposision</p>
          </div>
        </div>
        <div class="carousel-item">
          <img id="slider" src="./imagenes/presentacion3.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>LA MEJOR SOLUCION EL TERAPIAS</h5>
            <p>Contamoscon uno delos mejores centro de estudiopsicologicos</p>
          </div>
        </div>


      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </main>

  <section class="container">
    <article class="main row">
      <div class="col-md-4">
        <h3>NUESTROS SERVICIOS</h3>
        <hr size="15px" color="deepskyblue">
        <p>
          REGIMEN CONTRIBUTIVO

          <img src="./imagenes/regimenContributivo.jpg" alt="regimen contributivo" class="w-100 p-1" id="imgArticulos">
        <p>
          Nuestro regimen subsidiado es uno deloas mejores a nivel nacional y cuenta con un sistemade citas el cual esta avalado por la gestion de calidad del miniterio de salud
        </p>
        <hr>
        </p>
        <p>
          REGIMEN SUBSIDIADO

          <img src="./imagenes/regimenSubsidiado.jpg" alt="regimen subsidiado" class="w-100 p-1" id="imgArticulos">
        <p>
          Ingresa a nuestra area de regimen subsidiado, y contaras con infinidades de oportunidades, como descuentos especiales.
        </p>
        </p>
      </div>
      <div class="col-md-4">
        <h3>ATENCIONES</h3>
        <hr size="15px" color="deepskyblue">
        <p>
          ATENCION DOMICILIARIA

          <img src="./imagenes/domiciliaria.jpg" alt="atencion domiciliaria" class="w-100 p-1" id="imgArticulos">
        <p>
          Nuestra atencion domiciliaria es una de las mas costosas del mercado, por tal motivo es la mejor atencion
          que podras recibir en tu hogar, con esto hacemos enfasa en el transporte .
        </p>

        </p>
        <hr>
        <p>

          ATENCION A PRIMERA INFANCIA

          <img src="./imagenes/infancia.jpg" alt="primera infancia" class="w-100 p-1" id="imgArticulos">
        <p>
          Contamos con los mejores profesionales, los cuales son especializados en atenciona primera infancia,
          que cuidaran de tu niño para que no sea canson.
        </p>
        </p>
      </div>
      <aside class="col-xs-4 col-sm-4 col-md-4" id="ingreso">
        <form id="login">
          <img src="./iconos/userLogin.png" alt="inicio de sesion">
          <h1>INGRESAR</h1>
          <div class="inset">
            <p>
              <label for="email">usuario</label>
              <input type="text" name="email" id="email">
            </p>
            <p>
              <label for="password">contraseña</label>
              <input type="password" name="password" id="password">
            </p>
            <p>
              <input type="checkbox" name="remember" id="remember">
              <label for="remember">Recordar siempre micontraseña</label>
            </p>
          </div>
          <p class="p-container">
            <a href="https://support.google.com/accounts/answer/41078?hl=es-419&co=GENIE.Platform%3DAndroid">olvide mi
              contraseña</a>
            <input type="submit" name="go" id="go" value="Log in">
          </p>
        </form>
      </aside>
      <aside>
        <img src="" alt="">
      </aside>
    </article>
  </section>
  <div class="container text-center">
    <div class="row">
      <h4>NUSTROS ALIADOS</h4>
      <hr size="15px" color="deepskyblue">
      <div class="col">
        <a href="https://www.chanel.com/es/" target="_blank"><img class="aliados" src="./iconos/aliado1.png"
            alt="chanel"></a>
      </div>
      <div class="col">
        <a href="https://www.rolex.com/"><img class="aliados" src="./iconos/aliado6.png" alt="rolex"></a>
      </div>
      <div class="col">
        <a href="https://www.nike.com/es/"><img class="aliados" src="./iconos/aliado2.png" alt="nike"></a>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <a href="https://www.rappi.com.co/"><img class="aliados" src="./iconos/aliado3.png" alt="rapi"></a>
      </div>
      <div class="col">
        <a href="https://www.supremenewyork.com/"><img class="aliados" src="./iconos/aliado4.png" alt="supreme"></a>
      </div>
      <div class="col">
        <a href="https://cervezacorona.es/"><img class="aliados" src="./iconos/aliado5.png" alt="corona"></a>
      </div>
    </div>
  </div>
  <footer>
    <div class="container text-center">
      <div class="row">
        <div class="col-md-2">
          <img class="icoFooter" src="./iconos/ico.png" alt="icono">
          <h6>LINEAS DE ATENCION</h6>
          <li>
            Régimen Contributivo
            En Bogotá
            (60)1 307 7022
            Línea Gratuita Nacional
            01 8000 954400
          </li>
          <li>
            Régimen Subsidiado
            Línea Gratuita Nacional
            01 8000 952950
          </li>
          <li>
            Líneas gratuitas exclusivas COVID-19
            01 8000 930100
            Desde operadores: Claro, Movistar y Tigo.
            #961
            <br>
          </li>
          

        </div>

        <div class="col-md-2">
          <img class="icoFooter" src="./iconos/ico.png" alt="icono">
          <h6>OFICINAS ADMINISTRATIVAS</h6>
          <li>
            Dirección Nacional
            Carrera 85K No. 46A-66
            Bogotá D.C., Colombia
            Teléfono administrativo
            (60)1 419 3000
            Conoce las Sedes administrativas
            Contáctanos.
          </li>
        </div>
        <div class="col-md-5">
          <br>
          <h6>UBICACION DE NUESTRAS INSTALACIONES</h6>
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1988.4694914374936!2d-74.05640134207317!3d4.604947972716316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f99bfc4e83c9b%3A0x92f4884986542edc!2sCerro%20de%20Monserrate%2C%20Cra.%202%20Este%20%2341-48%2C%20Bogot%C3%A1!5e0!3m2!1sen!2sco!4v1659150618947!5m2!1sen!2sco"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
        <div class="col-md-3">
          <img src="./iconos/chatBot.gif" alt=" chat bot">
          
          <h6>CANAL DE ATENCION</h6>
        </div>
      </div>
    </div>
  </footer>


  <script src="../js/jquery-3.6.0.min.map"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>

</html>