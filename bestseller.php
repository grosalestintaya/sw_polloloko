<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Best Sellers</title>
	
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/business-casual.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<?php
		$Username = null;
		if(!empty($_SESSION["Username"]))
		{$Username = $_SESSION["Username"];}
?>
</head>

<body>
    <div class="brand">Delivery de Pizzas Margherita</div>
    <div class="address-bar"><strong>Directo</strong> Y a la puerta de tu casa</div>

    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="padding: 0 15px;" href="index.html">Delivery de Pizzas Margherita</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
				<li><a href="index.php">Inicio</a></li>
					<li><a href="bestseller.php">Pizzas más Populares</a></li>
					<li><a href="shop.php">Carta de Pizzas</a></li>
                    <li><a href="about.php">Nosotros</a></li>
					<li><a href="#" onclick="ManagementOnclick();">Administrador</a></li>
					<?php if($Username == null){echo '<li><a href="register.php?ActionType=Register">Registrarse para Pedidos</a></li>';} ?>
					<?php if($Username == null){echo '<li><a href="Login.php?Rol=User">Ingresar</a></li>';} else {echo '<li><a href="Logout.php">Cerrar Sección</a></li>';} ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

			<?php
				$num = 5;
				require 'Connection.php';
				$sql = "SELECT * FROM `tbl_producto` Limit 5";
				$Resulta = mysqli_query($Conn,$sql);
				while($Rows = mysqli_fetch_array($Resulta)){
					echo '	
						<div class="row">
							<div class="box" style="border-radius: 10px;">
								<div class="col-lg-12">
									<hr>
									<h2 class="intro-text text-center">Top '. $num.'</h2>
									<hr>
									<img class="img-responsive img-border img-left" src="data:image;base64,'.$Rows[8].'" alt="">
									<hr class="visible-xs">
									<p><strong>Nombre del la Pizza:</strong> '.$Rows[1].'</p>
									<p><strong>Tipo de Pizza:</strong> '.$Rows[2].'</p>
									<p><strong>Ingredientes:</strong> '.$Rows[3].'</p>
									<p><strong>Extras:</strong> '.$Rows[4].'</p>
									<p><strong>Precio: s/.</strong> '.$Rows[5].'</p>
									<a onclick="addToCartOnclick('.$Rows[0].');" href="#"  style="margin-bottom: 5px;" class="btn btn-primary">Agregar pedido</a>
								</div>
							</div>
						</div>';
					$num--;
				}
			?>
	</div>


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Delivery de Pizzas Margherita</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script>
		function addToCartOnclick(ProductoID)
		{	
			if(confirm("¿Está seguro de que desea agregar este pedido a su carrito?") == true){
			window.open("Order.php?ProductoID="+ProductoID,"_self",null,true);
			}
		}
	</script>

</body>

</html>
