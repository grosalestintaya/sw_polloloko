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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php
		$Username = null;
		if(!empty($_SESSION["Username"]))
		{
			$Username = $_SESSION["Username"];
		}
	?>
</head>

<body>

    <div class="brand">Delivery de Pizzas Margherita</div>
    <div class="address-bar"><strong>Directo</strong> Y a la puerta de tu casa</div>

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
                <a class="navbar-brand" style="padding: 0 15px;" href="index.html">Delivery de Pizzas Margherita</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                <li><a href="index.php">Inicio</a></li>
					<li><a href="bestseller.php">Pizzas más populares</a></li>
					<li><a href="shop.php">Carta de Pizzas</a></li>
                    <li><a href="about.php">Nosotros</a></li>
					<li><a href="#" onclick="ManagementOnclick();">Menu de Administrador</a></li>
					<?php if($Username == null){echo '<li><a href="register.php?ActionType=Register">Registrarse para pedidos</a></li>';} ?>
					<?php if($Username == null){echo '<li><a href="Login.php?Rol=User">Ingresar</a></li>';} else {echo '<li><a href="Logout.php">Cerrar Sesión</a></li>';} ?>
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
                        <strong>Delivery de Pizzas Margherita</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-6">
                    <img class="img-responsive img-border-left" src="img/slide-2.jpg" alt="">
                </div>
                <div class="col-md-6">
                    <p><b>Delivery de Pizzas Margherita</b> es una empresa en la ciudad de Abancay que brinda a sus clientes una amplia variedad de pizzas de fabricación propia, de varios tamaños. Los clientes tienen a disposición un menú que describe para cada una de las variedades, el nombre, los ingredientes y el precio según el tamaño y el tipo de la pizza. Los clientes realizan sus pedidos ingresando al sistema web para poder realizar su pedido.</p>

                    <p>También cuenta con el servicio de delivery, cuando se toma dicho pedido (ingresando al Sistema web) deberán solicitarse datos extras como dirección y correo . Con los datos solicitados, el pedido será entregado al personal de entrega para poder efectuar la entrega requerida por el cliente.</p><br>
                </div>

                <div class="map" style="text-align: center;">
                    <b><h4>Ubicación</h4></b>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2305.481957032348!2d-72.88222836799598!3d-13.63688582437816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x916d02decc4e058d%3A0xdf1b91644e72bc66!2sJr.%20Lima%2C%20Abancay%2003001!5e0!3m2!1ses!2spe!4v1632962607572!5m2!1ses!2spe" width="80%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
					<?php echo '<strong>'.$Username.'</strong>'; ?>
					<br>
					<strong>
					<?php if($Username != null){echo '<a href="ManageAccount.php?RoRolle=User">Manage Account</a> |';} ?> 
					<?php if($Username == null){echo '<a href="Login.php?Rol=User">Login</a>';} else {echo '<a href="Logout.php">Cerrar Sección</a>';} ?> | 
					<a href="#">Volver arriba</a>
					</strong><br>
					Copyright &copy; Delivery de Pizzas Margherita
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
		
		function ManagementOnclick(){
			if(confirm("Solo los administradores tienen permitido acceder a esta página. Inicie sesión como administrador.") == true)
			{
				window.open("Login.php?Rol=Admin","_self",null,true);
			}
		}
		
    </script>

</body>

</html>
