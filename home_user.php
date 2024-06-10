
<?php
$tiempo_de_vida = 5; 
ini_set('session.gc_maxlifetime', $tiempo_de_vida);
session_set_cookie_params($tiempo_de_vida);
session_start();

// Verificar si la sesión está activa
if (isset($_SESSION['tiempo_inicio']) && (time() - $_SESSION['tiempo_inicio'] > $tiempo_de_vida)) {
    // Si la sesión ha expirado, destruirla y redirigir a otra página
    session_unset();
    session_destroy();
} else {
    // Si la sesión está activa, actualizar el tiempo de inicio de sesión
    $_SESSION['tiempo_inicio'] = time();
}
if(!isset($_SESSION['correo'
])){
    header('location: inicio_sesion/inicio_sesion.html');
}else{
    include "inicio_sesion/conexion.php";
    $sql = "SELECT * FROM user";
    $resultado = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>sungla</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <link rel="shortcut icon" href="icon/icon.svg" type="image/x-icon">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <!__Este estilo es utilizado por el búscador-->
        <style>
            #itemList {
                list-style-type: none;
                padding: 0;
            }
        </style>
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                <marquee direction="down"><a href="index.html"><img src="images/logo.png" alt="#" /></a></marquee>
                                    <form id="searchForm">
                                        <div class="search-container">
                                            <input class="form-control me-2 nav-link" style="width: 300px;" type="text"
                                                id="searchInput" onkeydown="checkEnter(event)"
                                                oninput="autocompleteSearch(this.value)" placeholder="Buscar...">
                                        </div>
                                        <ul id="searchResults"></ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarsExample04">
                                <ul id="itemList" class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#">Inicio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Cursos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Novedades</a>
                                    </li>
                                    <li class="nav-item d_none login_btn">
                                        <a class="nav-link" href="#">
                                            <?php echo $_SESSION['correo'];?>
                                        </a>
                                    </li>
                                    <li class="nav-item d_none">
                                        <a class="nav-link" href="inicio_sesion/cerrar.php">Cerrar sesión</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="about">
        <div class="container">
            <div class="row d_flex">
                <hr>
                <div class="col-md-7"">
                    <?php
                        if ($resultado->rowCount() > 0) {
                            // Inicio de la tabla HTML
                            echo " <table border='1'>";
                    echo "<tr>
                        <th>Nombre</th>
                        <th>Primer apellido</th>
                        <th>Segundo apellido</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                    </tr>";

                    // Iterar sobre los resultados y mostrarlos en la tabla
                    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . $fila['nombre'] . "</td>";
                        echo "<td>" . $fila['apellido_p'] . "</td>";
                        echo "<td>" . $fila['apellido_m'] . "</td>";
                        echo "<td>" . $fila['direccion'] . "</td>";
                        echo "<td>" . $fila['telefono'] . "</td>";
                        echo "</tr>";
                    }

                    // Fin de la tabla HTML
                    echo "</table>";
                    } else {
                    // Mensaje si no hay resultados
                    echo "No se encontraron resultados.";
                    }

                    ?>
                </div>
            </div>
        </div><br>
        <hr>

        <!-- end contact section -->
        <!--  footer -->
        <footer>
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <ul class="location_icon">
                                <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a><br>Location</li>
                                <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a><br>+01 1234567890
                                </li>
                                <li><a href="#"><i class="fa fa-envelope"
                                            aria-hidden="true"></i></a><br>vdroid@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <p>© 2024 All Rights Reserved</p>
                                <div class="float-end"><a href="#"><img src="icon/WebsymbolUpCircle.svg"
                                            style="width: 40px;" alt=""> Up</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end footer -->
        <!-- Javascript files-->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery-3.0.0.min.js"></script>

        <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="js/custom.js"></script>
<!--         <script>
                // Función para actualizar el tiempo de inicio de sesión
                function actualizarTiempoInicioSesion() {
                    // Realizar una solicitud AJAX al servidor para actualizar el tiempo de inicio de sesión
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", "/actualizar.php", true);
                    xhr.send();
                }

                // Evento para detectar movimiento del mouse
                document.addEventListener('mousemove', function () {
                    // Llamar a la función para actualizar el tiempo de inicio de sesión
                    actualizarTiempoInicioSesion();
                });

                // Evento para detectar clics
                document.addEventListener('click', function () {
                    // Llamar a la función para actualizar el tiempo de inicio de sesión
                    actualizarTiempoInicioSesion();
                });
                // Función para redirigir a la página de inicio de sesión después de que la sesión haya expirado
        </script> -->
        <script>
            // Función para redirigir a otra página después de un período de inactividad
            function redirigirPorInactividad() {
                <?php session_unset();
                    session_destroy();
                ?>
                window.location.href = 'inicio_sesion/inicio_sesion.html'; // Cambia 'otra_pagina.php' por la URL deseada
            }

            // Función para reiniciar el temporizador si hay actividad del usuario
            function reiniciarTemporizador() {
                clearTimeout(tiempoInactivo);
                tiempoInactivo = setTimeout(redirigirPorInactividad, 5000); // Redirigir después de 5 segundos 
            }

            // Evento para detectar movimiento del mouse
            document.addEventListener('mousemove', reiniciarTemporizador);

            // Evento para detectar clics
            document.addEventListener('click', reiniciarTemporizador);

            // Iniciar el temporizador al cargar la página
            var tiempoInactivo = setTimeout(redirigirPorInactividad, 5000); // Redirigir después de 5 segundos
        </script>
</body>

</html>
<?php
}
?>