<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Pizzas</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/business-casual.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
	<!--Add favorites icons-->

	<link rel="apple-touch-icon" href="https://irp.cdn-website.com/a47250df/dms3rep/multi/Logo+pollo+loko-930c84e4.png" />

	<link rel="icon" type="image/x-icon" href="https://irp.cdn-website.com/a47250df/site_favicon_16_1620353217497.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php
	$Username = null;
	if (!empty($_SESSION["Username"])) {
		$Username = $_SESSION["Username"];
	}
	$ProductAction = $_GET["ProductAction"];
	if (empty($_SESSION['Admin'])) {
		echo '<script>window.open("index.php","_self",null,true);</script>';
	}
	?>
</head>

<body>


	<div class="bg-warning ">
		<div class="brand">Polleria Pollo Loko</div>
		<div class="address-bar"><strong>Un Sabor de Locura - </strong>El loco sabor a granja ...</div>

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
				<a class="navbar-brand" style="padding: 0 15px;" href="index.html">Polleria pollo Loko</a>
			</div>
			<div class="collapse navbar-collapse d-flex p-2 justify-content-center" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav ">
					<li><a style="color: white;" href="index.php">Inicio</a></li>
					<li><a style="color: white;" href="Management_Orders.php">Pedido</a></li>
					<li><a style="color: white;" href="Management_Products.php?ProductAction=Add">Registrar Combo</a></li>
					<li><a style="color: white;" href="Management_ProductsList.php">Lista de Combos</a></li>
					<li><a style="color: white;" href="Management_Customers.php">Clientes</a></li>

				</ul>
			</div>
		</div>
	</nav>

	<div class="container">

		<div class="row">
			<div class="box">
				<div class="col-lg-12">
					<hr>
					<h2 class="intro-text text-center">Cmbos - pollo</h2>
					<hr>

					<div class="col-md-12">
						<div class="col-md-6">
							<form role="form" action="Management_Products_Action.php?ProductAction=
							<?php echo $ProductAction;
							if ($ProductAction == "Edit") {
								echo "&ProductoID=" . $_GET['ProdID'];
							} ?>" method="POST" enctype="multipart/form-data">

								<div class="form-group">
									<label for="NombreProducto">Nombre del combo:</label>
									<input type="text" name="NombreProducto" class="form-control" id="NombreProducto" placeholder="Ingresa el nombre de la Pizza" required>
								</div>

								<div class="form-group">
									<label for="Tamanio">Tamaño del combo:</label>
									<input type="text" name="Tamanio" class="form-control" id="Tamanio" placeholder="Ingresa el Tipo de Pizza" required>
								</div>

								<div class="form-group">
									<label for="Precio">Precio del Combo:</label>
									<input type="text" name="Precio" class="form-control" id="Precio" placeholder="Ingrese el precio de la Pizza" required>
								</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="Ingredientes">Ingredientes:</label>
								<input type="text" name="Ingredientes" class="form-control" id="Ingredientes" placeholder="Ingredientes" required>
							</div>

							<div class="form-group">
								<label for="Extras">Extras:</label>
								<input type="text" name="Extras" class="form-control" id="Extras" placeholder="Ingrese los extras" required>
							</div>

							<div class="form-group">
								<label for="Categoria">Categoría:</label>
								<input type="text" name="Categoria" class="form-control" id="Categoria" placeholder="Ingrese la categoria de Producto" required>
							</div>

							<div class="form-group">
								<label for="ProductoImagen">Imagen de Producto:</label>
								<input type="file" name="ProductoImagen">
							</div>

							<div class="form-group">
								<button type="submit" style="float: right;" class="btn btn-default">Enviar</button>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- /.container -->

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<p>Copyright &copy;Polleria Pollo Loko 2022 </p>
				</div>
			</div>
		</div>
	</footer>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {

		});
	</script>

</body>

</html>