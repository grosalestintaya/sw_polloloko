<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Polleria Pollo Loko </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/business-casual.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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


<body >

    <nav style="background-color:#fa8e00;" class="navbar navbar-default " role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="padding: 0 15px;" href="index.html">Polleria Pollo loko</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="bestseller.php">Pedidos mas populares</a></li>
                    <li><a href="shop.php">Carta </a></li>
                    <li><a href="about.php">Nosotros</a></li>
                    <li><a href="#" onclick="ManagementOnclick();">Administrador</a></li>
                    <?php if ($Username == null) {
                        echo '<li><a href="register.php?ActionType=Register">Registrarse para Pedidos</a></li>';
                    } ?>
                    <?php if ($Username == null) {
                        echo '<li><a href="Login.php?Rol=User">Ingresar</a></li>';
                    } else {
                        echo '<li><a href="Logout.php">Cerrar Sección</a></li>';
                    } ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="banner">
        <div class="banner-body">
            <h3  style="font-size:35px; color:orange;" class="text-uppercase solid ">Bienvenido a Polleria Pollo Loko</h3>
            <a style="font-size:20px;" href="shop.php" class="btn btn-warning"><i class="fas fa-hamburger fa-fw"></i> &nbsp; Ver Carta y Combos</a>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                        </ol>

                        <div class="carousel-inner bg-danger">
                            <div class="item active">
                                <img class="img-responsive img-full" src="img/pollo-1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/pollo-2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/pollo-3.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/pollo-4.jpg" alt="">
                            </div>
                            
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>

        <?php
        $conn = mysqli_connect("examencloud.cbu56rel5olk.us-east-1.rds.amazonaws.com", "admin", "76668813g", "db_swdp");
        $sql = "SELECT * FROM `tbl_producto` Limit 10";
        $Resulta = mysqli_query($conn, $sql);
        ?>


        <?php while ($Rows = mysqli_fetch_array($Resulta)) {
            echo '	
		<div class="col-sm-4 col-lg-4 col-md-4">
             <div style="background-color:#fa8e00;" class="thumbnail">
				<h4 style="text-align: center;">' . $Rows[2] . '</h4>
                <img style="border: 2px solid gray; border-radius: 10px; height: 229px; width: 298px;" src="data:image;base64,' . $Rows[8] . '" alt="">
                <div class="caption">
					<p><strong>Nombre de la Pizza:</strong> ' . $Rows[1] . '</p>
					<p><strong>Ingredientes:</strong> ' . $Rows[3] . '</p>
					<p><strong>Extras:</strong> ' . $Rows[4] . '</p>
					<p><strong>s/. ' . $Rows[5] . '.00</strong></p>
                </div>
				<center><a onclick="addToCartOnclick(' . $Rows[0] . ');" href="#"  style="margin-bottom: 5px;" class="btn btn-primary">Agregar pedido</a></center>
            </div>
        </div>
		';
        } ?>

    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>
                        <?php echo '<strong>' . $Username . '</strong>'; ?>
                        <br>
                        <strong>
                            <?php if ($Username != null) {
                                echo '<a href="ManageAccount.php?Rol=User">Mi Cuenta</a> |';
                            } ?>
                            <?php if ($Username == null) {
                                echo '<a href="Login.php?Rol=User">Ingresar</a>';
                            } else {
                                echo '<a href="Logout.php">Cerrar Sección</a>';
                            } ?> |
                            <a href="#">Volver al inicio</a>
                        </strong><br>
                        Copyright &copy; Polleria Pollo Loko 2022
                    </p>

                </div>
            </div>
        </div>
    </footer>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $('.carousel').carousel({
            interval: 5000 //changes the speed
        })

        $('#reg').click(function() {
            window.open('register.html', _self);
        });

        function ManagementOnclick() {
            if (confirm("Solo los administradores tienen permitido acceder a esta página. Inicie sesión como administrador.") == true) {
                window.open("Login.php?Rol=Admin", "_self", null, true);
            }
        }

        function addToCartOnclick(ProductoID) {
            if (confirm("Estas seguro que deseas agregar este pedido al carrito") == true) {
                window.open("Order.php?ProductoID=" + ProductoID, "_self", null, true);
            }
        }
    </script>
</body>

</html>