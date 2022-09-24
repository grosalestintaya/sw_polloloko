<?php
	session_start();
	require 'Connection.php';
	$ProductoID = $_GET['ProductoID'];
	$ClienteID = $_GET['ClienteID'];
	date_default_timezone_set('America/Lima');
	$DateOrder = date("Y/m/d H:i:s");
	
	if($_SESSION['Username'] == null || $_SESSION['Password'] == null)
	{
		echo "<script>window.open('Login.php?Rol=User','_self',null,true); window.alert('Please Login to Process your order');</script>";
	}
	
	$sql2 = "INSERT INTO `tbl_pedido`(`ProductoID`, `ClienteID`, `FechaPedido`) ".
			"VALUES ('$ProductoID','$ClienteID','$DateOrder')";
	$res2 = mysqli_query($Conn,$sql2);
	if($res2){
		echo "<script>window.alert('Success'); window.open('index.php','_self',null,true);</script>";
	}
?>