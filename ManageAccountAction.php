<?php
	require 'Connection.php';
	$PedidoID = $_GET["oID"];
	
	$sql = "DELETE FROM `tbl_pedido` WHERE PedidoID = " . $PedidoID;
	$res = mysqli_query($Conn,$sql);
	if($res)
	{
		echo '<script>window.open("ManageAccount.php","_self",null,true)</script>';
	}

?>