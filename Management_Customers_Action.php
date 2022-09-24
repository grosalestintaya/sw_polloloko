<?php

	require 'Connection.php';
	$ClienteID = $_GET["ID"];
	
	$sql = "DELETE FROM `tbl_cliente` WHERE ClienteID = " . $ClienteID;
	$res = mysqli_query($Conn,$sql);
	if($res)
	{
		echo '<script>window.open("Management_Customers.php","_self",null,true)</script>';
	}

?>