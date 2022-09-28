<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Product List</title>

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
				<a class="navbar-brand" style="padding: 0 15px;" href="index.html">Polleria Pollo Loko</a>
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
					<h2 class="intro-text text-center">Lista de Combos - polleria</h2>
					<hr>
					<div class="col-lg-12">
						<div class="table-responsive">
							<table border="5px" class="table">
								<tr style="text-align: center; color: Black; font-weight: bold;">
									<td>N°</td>
									<td>Categoria</td>
									<td>Imagen de la Pizza</td>
									<td>Nombre de la Pizza</td>
									<td>Tamaño de la Pizza</td>
									<td>Ingredientes</td>
									<td>Extras</td>
									<td>Precio</td>
									<td>Acciónes del registrador de productos</td>
									
								</tr>

								<?php
								require 'Connection.php';
								$sql = "SELECT ProductoID,Categoria, ProductoImagen, NombreProducto,Tamanio, Ingredientes,Extras,Precio FROM tbl_producto";
								$Resulta = mysqli_query($Conn, $sql);
								while ($Rows = mysqli_fetch_array($Resulta)) :;
								?>
									<tr style="color: black ">
										<td><?php echo $Rows[0]; ?></td>
										<td><?php echo $Rows[1]; ?></td>
										<td><img style="width: 60px; height: 60px;" src="data:image;base64,<?php echo $Rows[2]; ?>"></td>
										<td><?php $cid = $Rows[3];
											echo $cid; ?></td>
										<td><?php echo $Rows[4]; ?></td>
										<td><?php echo $Rows[5]; ?></td>
										<td><?php echo $Rows[6]; ?></td>
										<td><?php echo $Rows[7]; ?></td>
										<td  class=" row d-flex p-7">
											<a class="btn btn-primary" href="#" onclick="ProductOnlick('Edit',<?php echo $Rows[0]; ?>)">Editar</a> |
											<a  class="btn btn-danger"  href="#" onclick="ProductOnlick('Delete',<?php echo $Rows[0]; ?>)">Eliminar</a>
										</td>
									<?php endwhile; ?>
									</tr>
							</table>
						</div>
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
					<p>Copyright &copy; Polleria Pollo Loko</p>
				</div>
			</div>
		</div>
	</footer>


	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		function ProductOnlick(action, pid) {
			if (action == "Edit") {
				if (confirm("Seguro deseas editar este producto?") == true) {
					window.open("Management_Products.php?ProdID=" + pid + "&ProductAction=" + action, "_self", null, true);
				}
			} else if (action == "Delete") {
				if (confirm("Seguro deseas eliminar este producto?") == true) {
					window.open("Management_Products_Action.php?ProdID=" + pid + "&ProductAction=" + action, "_self", null, true);
				}
			}
		}
	</script>

</body>

</html>