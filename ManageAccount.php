<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Cuenta</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/business-casual.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
	<!--Add favorites icons-->

	<link rel="apple-touch-icon" href="https://irp.cdn-website.com/a47250df/dms3rep/multi/Logo+pollo+loko-930c84e4.png" />

	<link rel="icon" type="image/x-icon" href="https://irp.cdn-website.com/a47250df/site_favicon_16_1620353217497.ico" />

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php
	require 'Connection.php';
	$Username = null;
	if (!empty($_SESSION["Username"])) {
		$Username = $_SESSION["Username"];
	}
	$sql = "select * from tbl_cliente where Username = '" . $Username . "' and Password = '" . $_SESSION['Password'] . "'";
	$Res = mysqli_query($Conn, $sql);
	while ($Rows = mysqli_fetch_array($Res)) {
		$C_ID = $Rows[0];
		$C_Username = $Rows[1];
		$C_Password = $Rows[2];
		$C_Nombrecliente = $Rows[4];
		$C_Appaterno = $Rows[5];
		$C_Ammaterno = $Rows[6];
		$C_Direccion = $Rows[7];
		$C_Email = $Rows[8];
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
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="index.php">Inicio</a></li>
					<li><a href="bestseller.php">Top Pizzas mas Vendidas</a></li>
					<li><a href="shop.php">Carta de Pizzas</a></li>
					<li><a href="about.php">Nosotros</a></li>
					<?php if ($Username == null) {
						echo '<li><a href="register.php?ActionType=Register">Register</a></li>';
					} ?>
					<?php if ($Username == null) {
						echo '<li><a href="Login.php?Rol=User">Login</a></li>';
					} else {
						echo '<li><a href="Logout.php">Cerrar Sección</a></li>';
					} ?>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">

		<div class="row">
			<div class="box">
				<div class="col-lg-12">
					<hr>
					<h2 class="intro-text text-center">Administrar Cuenta</h2>
					<hr>
					<div class="col-md-6">
						<form role="form" action="Register.php?ActionType=Edit&Loc=MA&ID=<?php echo $C_ID; ?>" method="POST">
							<h4 style="text-align: center">Información de la cuenta</h4>
							<div class="form-group">
								<label for="username">Usuario:</label>
								<input type="text" name="Username" class="form-control" id="Username" value="<?php echo $C_Username; ?>" disabled>
							</div>

							<div class="form-group">
								<label for="Password">Contraseña:</label>
								<input type="Password" name="Password" class="form-control" id="Password" value="<?php echo $C_Password; ?>" disabled>
							</div>

							<div class="form-group">
								<label for="Nombrecliente">Nombre:</label>
								<input type="text" name="Nombrecliente" class="form-control" id="Nombrecliente" value="<?php echo $C_Nombrecliente; ?>" disabled>
							</div>

							<div class="form-group">
								<label for="Appaterno">Primer Apellido:</label>
								<input type="text" name="Appaterno" class="form-control" id="Appaterno" value="<?php echo $C_Appaterno; ?>" disabled>
							</div>

							<div class="form-group">
								<label for="Ammaterno">Segundo Apellido:</label>
								<input type="text" name="Ammaterno" class="form-control" id="Ammaterno" value="<?php echo $C_Ammaterno; ?>" disabled>
							</div>

							<div class="form-group">
								<label for="Direccion">Dirección:</label>
								<input type="text" name="Direccion" class="form-control" id="Direccion" value="<?php echo $C_Direccion; ?>" disabled>
							</div>

							<div class="form-group">
								<label for="Email">Dirreción de correo:</label>
								<input type="email" name="Email" class="form-control" id="Email" value="<?php echo $C_Email; ?>" disabled>
							</div>

							<button type="submit" class="btn btn-default">Editar información</button>
						</form>
					</div>

					<div class="col-md-6">
						<h4 style="text-align: center">Mis pedidos</h4>
						<div class="table-responsive">
							<table border="5px" class="table">
								<tr style="text-align: center; color: Black; font-weight: bold;">
									<td>ID Pedido</td>
									<td>Nombre de la Pizza</td>
									<td>Tamaño de Pizza</td>
									<td>Precio</td>
									<td>Fecha</td>
									<td>Acción</td>
								</tr>

								<?php
								$sqlI = "SELECT tbl_pedido.PedidoID, tbl_producto.NombreProducto, tbl_producto.Tamanio, " .
									"tbl_producto.Precio, tbl_pedido.FechaPedido FROM tbl_producto INNER JOIN " .
									"tbl_pedido on tbl_pedido.ProductoID = tbl_producto.ProductoID WHERE tbl_pedido.ClienteID = $C_ID";
								$Resulta = mysqli_query($Conn, $sqlI);
								while ($Rows = mysqli_fetch_array($Resulta)) :;
								?>
									<tr style="color: black">
										<td><?php echo $Rows[0]; ?></td>
										<td><?php echo $Rows[1]; ?></td>
										<td><?php echo $Rows[2]; ?></td>
										<td><?php echo $Rows[3]; ?></td>
										<td><?php echo $Rows[4]; ?></td>
										<td>
											<a href="#" onclick="OrderOnclick(<?php echo $Rows[0]; ?>);">Cancel</a>
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
					<p>Copyright &copy; Delivery de Pizzas Margherita 2021</p>
				</div>
			</div>
		</div>
	</footer>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		function OrderOnclick(PedidoID) {
			if (confirm("Are you sure you want to cancel this order?") == true) {
				window.open("ManageAccountAction.php?oID=" + PedidoID, "_self", null, true);
			}
		}
	</script>

</body>

</html>