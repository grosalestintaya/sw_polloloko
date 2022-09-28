<? session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/business-casual.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
    <!--Add favorites icons-->

    <link rel="apple-touch-icon" href="https://irp.cdn-website.com/a47250df/dms3rep/multi/Logo+pollo+loko-930c84e4.png" />

    <link rel="icon" type="image/x-icon" href="https://irp.cdn-website.com/a47250df/site_favicon_16_1620353217497.ico" />

    <?php
    $Username = null;
    $Rol = $_GET["Rol"];
    if (!empty($_SESSION["Username"])) {
        $Username = $_SESSION["Username"];
    }
    ?>
</head>

<body>

    <div class="bg-warning ">
        <div class="brand">Polleria Pollo Loko</div>
        <div class="address-bar"><strong>Un Sabor de Locura -
            </strong>El loco sabor a granja, no te lo pierdas!....</div>

    </div>

    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="padding: 0 15px;" href="index.html">Polleria Pollo Loko</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a style="color: white;" href="index.php">Inicio</a></li>
                    <li><a style="color: white;" href="bestseller.php">Pedidos mas populares</a></li>
                    <li><a style="color: white;" href="shop.php">Carta </a></li>
                    <li><a style="color: white;" href="about.php">Nosotros</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="row">
            <div class="box">

                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Ingresar</h2>
                    <hr>
                </div>

                <div class="col-md-6">
                    <form role="form" action="LoginDestination.php?Rol=<?php echo $Rol; ?>" method="POST">

                        <div class="form-group">
                            <label for="Username">Usuario:</label>
                            <input type="text" name="Username" class="form-control" id="Username" placeholder="Ingrese su usuario" required>
                        </div>

                        <div class="form-group">
                            <label for="Password">Contraseña:</label>
                            <input type="password" name="Password" class="form-control" id="Password" placeholder="Ingrese su contraseña" required>
                        </div>

                        <button type="submit" class="btn btn-default">Ingresar</button>

                    </form>
                </div>

            </div>
        </div>

    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Polleria Pollo Loko 2022 </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>