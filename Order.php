<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pedido</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/business-casual.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" 
	rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" 
	rel="stylesheet" type="text/css">
	<style>
		#pdetails span{
			float: right;
		}
	</style>
</head>

<body>

    <div class="brand">Delivery de Pizzas Margherita</div>
    <div class="address-bar"><strong>Directo</strong> y a la Puerta de tu Casa</div>

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
					<li><a href="bestseller.php">Pizzas mas Populares</a></li>
					<li><a href="shop.php">Carta de Pizzas</a></li>
                    <li><a href="about.php">Nosotros</a></li>
                </ul>
            </div>
        </div>
    </nav>
	
	<?php
		require 'Connection.php';
		$UN = $_SESSION['Username'];
		$PASS = $_SESSION['Password'];
		$ProductoID = $_GET['ProductoID'];

		if(empty($UN)){echo '<script>window.open("Login.php?Rol=User","_self",null,true);</script>';}
		
		$sql = "SELECT * FROM `tbl_cliente` WHERE `Username` = '".$UN."' and `Password` = '".$PASS."' and `Rol` = 'User'";
		$res = mysqli_query($Conn,$sql);
		while($Rows = mysqli_fetch_array($res)){
			$ClienteID = $Rows[0];
		}
	?>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Pedido</h2>
                    <hr><br>
                </div>

                <div class="col-md-6">
                 <form role="form" action="OrderAction.php?ProductoID=<?php echo $ProductoID; ?>&ClienteID=<?php echo $ClienteID; ?>" method="POST">
					<div class="form-group">
					  <label for="ProductoID">ID de la Pizza:</label>
					  <input type="text" name="ProductoID" class="form-control" id="ProductoID" value="<?php echo $ProductoID; ?>" disabled>
					</div>
					<div class="form-group">
					  <label for="ClienteID">ID Cliente:</label>
					  <input type="text" name="ClienteID" class="form-control" id="ClienteID" value="<?php echo $ClienteID; ?>" disabled>
					</div>
						<button type="submit" style="float: right;" class="btn btn-default">Confirmar Pedido</button>
					</form>
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
                    <p>Copyright &copy; Delivery de Pizzas Margherita 2021</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
