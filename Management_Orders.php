<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Products</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/business-casual.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
    <!--Add favorites icons-->

    <link rel="apple-touch-icon" href="https://irp.cdn-website.com/a47250df/dms3rep/multi/Logo+pollo+loko-930c84e4.png" />

    <link rel="icon" type="image/x-icon" href="https://irp.cdn-website.com/a47250df/site_favicon_16_1620353217497.ico" />


    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php
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
                    <h2 class="intro-text text-center">Pedidos</h2>
                    <hr>
                    <div class="table-responsive">
                        <table border="5px" class="table">
                            <tr style="text-align: center; color: Black; font-weight: bold;">
                                <td>N° de Pedido</td>
                                <td>Cliente</td>
                                <td>Dirección del Cliente</td>
                                <td>Nombre del bombo</td>
                                <td>Tamaño de combo</td>
                                <td>Precio</td>
                                <td>Fecha de Pedido</td>
                                <td>Acción</td>
                            </tr>

                            <?php
                            require 'Connection.php';
                            $sqlI = "SELECT tbl_pedido.PedidoID,CONCAT(Nombrecliente,' ', Appaterno,' ',Ammaterno),Direccion ,tbl_producto.NombreProducto, tbl_producto.Tamanio, tbl_producto.Precio, tbl_pedido.FechaPedido FROM tbl_producto RIGHT JOIN tbl_pedido on tbl_pedido.ProductoID = tbl_producto.ProductoID INNER JOIN tbl_cliente on tbl_pedido.ClienteID=tbl_cliente.ClienteID ORDER BY tbl_pedido.PedidoID";
                            $Resulta = mysqli_query($Conn, $sqlI);
                            while ($Rows = mysqli_fetch_array($Resulta)) :;
                            ?>
                                <tr style="color: black">
                                    <td><?php echo $Rows[0]; ?></td>
                                    <td><?php echo $Rows[1]; ?></td>
                                    <td><?php echo $Rows[2]; ?></td>
                                    <td><?php echo $Rows[3]; ?></td>
                                    <td><?php echo $Rows[4]; ?></td>
                                    <td><?php echo $Rows[5]; ?></td>
                                    <td><?php echo $Rows[6]; ?></td>
                                    <td>
                                        <a class="btn btn-danger" style="color: black;" href="#" onclick="CancelOrderOnclick(<?php echo $Rows[0]; ?>);">Eliminar pedido</a>
                                    </td>
                                <?php endwhile; ?>
                                </tr>
                        </table>
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
                    <p>Copyright &copy; Polleria Pollo Loko 2022</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        function CancelOrderOnclick(ID) {
            if (confirm("¿Está seguro de que desea eliminar este pedido?") == true) {
                window.open("Management_Orders_Action.php?id=" + ID, "_self", null, true);
            }
        }
    </script>

</body>

</html>