<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>About</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
     <!--Add favorites icons-->

     <link rel="apple-touch-icon" href="https://irp.cdn-website.com/a47250df/dms3rep/multi/Logo+pollo+loko-930c84e4.png" />

<link rel="icon" type="image/x-icon" href="https://irp.cdn-website.com/a47250df/site_favicon_16_1620353217497.ico" />


    <?php
    $Username = null;
    if (!empty($_SESSION["Username"])) {
        $Username = $_SESSION["Username"];
    }
    ?>
</head>

<body class="bg-danger">

    <div class="bg-warning ">
        <div class="brand">Polleria Pollo Loko</div>
        <div class="address-bar"><strong>Un Sabor de Locura - </strong>El loco sabor a granja ...</div>

    </div>
    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" style="padding: 0 15px;" href="index.html">Polleria Polo Loko</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a style="color: white;" href="index.php">Inicio</a></li>
                    <li><a style="color: white;" href="bestseller.php">Pedidos mas populares</a></li>
                    <li><a style="color: white;" href="shop.php">Nuestra carta salon</a></li>
                    <li><a style="color: white;" href="about.php">Nosotros</a></li>
                    <li><a style="color: white;" href="#" onclick="ManagementOnclick();">Menu de Administrador</a></li>
                    <?php if ($Username == null) {
                        echo '<li><a style="color: white;" href="register.php?ActionType=Register">Registrarse para pedidos</a></li>';
                    } ?>
                    <?php if ($Username == null) {
                        echo '<li><a style="color: white;" href="Login.php?Rol=User">Ingresar</a></li>';
                    } else {
                        echo '<li><a style="color: white;"  href="Logout.php">Cerrar Sesión</a></li>';
                    } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Polleria Pollo Loko</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-6">
                    <img class="img-responsive img-border-left" src="img/pollo-1.jpg" alt="">
                </div>
                <div class="col-md-6">
                    <p><b>Polleria Pollo Loko</b> Somos una empresa que se dedica a la venta de pollo a la brasa y elabora los mejores platos para compartir en familia. Nuestra experiencia nos avala por ofrecer productos de primera calidad y llevar los sabores de la granja a tu mesa.</p>

                    <p> Además, contamos con todos los protocolos de bioseguridad para llevarles tranquilidad y confianza a nuestros clientes.</p><br>
                </div>

                <div class="map" style="text-align: center;">
                    <b>
                        <h4>Ubicación</h4>
                    </b>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3877.3863494379675!2d-72.88668778463006!3d-13.63424677716847!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x916d032f81c10ea5%3A0xdd91c6dbbfe9c2b7!2sPOLLO%20LOKO!5e0!3m2!1ses-419!2spe!4v1620181790245!5m2!1ses-419!2spe" width="80%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>
                        <?php echo '<strong>' . $Username . '</strong>'; ?>
                        <br>
                        <strong>
                            <?php if ($Username != null) {
                                echo '<a href="ManageAccount.php?RoRolle=User">Manage Account</a> |';
                            } ?>
                            <?php if ($Username == null) {
                                echo '<a href="Login.php?Rol=User">Login</a>';
                            } else {
                                echo '<a href="Logout.php">Cerrar Sección</a>';
                            } ?> |
                            <a href="#">Volver arriba</a>
                        </strong><br>
                        Copyright &copy; Polleria  Pollo Loko 2022
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script>
        function ManagementOnclick() {
            if (confirm("Solo los administradores tienen permitido acceder a esta página. Inicie sesión como administrador.") == true) {
                window.open("Login.php?Rol=Admin", "_self", null, true);
            }
        }
    </script>

</body>

</html>