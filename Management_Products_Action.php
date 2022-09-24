<?php

	session_start();
	$ProductAction = $_GET["ProductAction"];
	
	require 'Connection.php';
	
	
	if($ProductAction == "Add")
	{
		$_NombreProducto = $_POST["NombreProducto"];
		$_Tamanio = $_POST["Tamanio"];
		$_Ingredientes = $_POST["Ingredientes"];
		$_Extras = $_POST["Extras"];
		$_Categoria = $_POST["Categoria"];
		$_Precio = $_POST["Precio"];
		
		$image = addslashes($_FILES['ProductoImagen']['tmp_name']);
		$name = addslashes($_FILES['ProductoImagen']['name']);
		$image = file_get_contents($image);
		$image = base64_encode($image);
		
		$sql = "INSERT INTO `tbl_producto`(`NombreProducto`, `Tamanio`, `Ingredientes`, `Extras`,`Precio`, `Categoria`, `ProductoImagenNombre`, `ProductoImagen`)" . 
		"VALUES ('$_NombreProducto','$_Tamanio','$_Ingredientes','$_Extras','$_Precio','$_Categoria','$name','$image')";
		$res = mysqli_query($Conn,$sql);
		if($res)
		{
			echo '<script>window.open("Management_ProductsList.php","_self",null,true);</script>';
		}
		else
		{
			echo '<script>alert("FAILED!")</script>';
		}
	}else if($ProductAction == "Edit")
	{
		$_NombreProducto = $_POST["NombreProducto"];
		$_Tamanio = $_POST["Tamanio"];
		$_Ingredientes = $_POST["Ingredientes"];
		$_Extras = $_POST["Extras"];
		$_Categoria = $_POST["Categoria"];
		$_Precio = $_POST["Precio"];
		
		$image = addslashes($_FILES['ProductoImagen']['tmp_name']);
		$name = addslashes($_FILES['ProductoImagen']['name']);
		$image = file_get_contents($image);
		$image = base64_encode($image);
		
		$_ProductoID = $_GET["ProductoID"];
		if(empty($_FILES['ProductoImagen']['tmp_name'])){
			$sql = "UPDATE `tbl_producto` SET `NombreProducto`='$_NombreProducto',`Tamanio`='$_Tamanio',`Ingredientes`='$_Ingredientes'," .
				   "`Extras`='$_Extras',`Precio`='$_Precio',`Categoria`='$_Categoria' WHERE `ProductoID` =  $_ProductoID";
			$res = mysqli_query($Conn,$sql);
			if($res)
			{
				echo '<script>window.alert("Product has been successfully updated!"); window.open("Management_ProductsList.php","_self",null,true)</script>';
			}
		}
		$sql = "UPDATE `tbl_producto` SET `NombreProducto`='$_NombreProducto',`Tamanio`='$_Tamanio',`Ingredientes`='$_Ingredientes'," .
			   "`Extras`='$_Extras',`Precio`='$_Precio',`Categoria`='$_Categoria'," .
			   "`ProductoImagenNombre`='$name',`ProductoImagen`='$image' WHERE `ProductoID` = $_ProductoID";
		$res = mysqli_query($Conn,$sql);
		if($res)
		{
			echo '<script>window.alert("Product has been successfully updated!"); window.open("Management_ProductsList.php","_self",null,true)</script>';
		}
	}else if($ProductAction == "Delete")
	{
		$_ProductoID = $_GET["ProdID"];
		$sql = "Delete from `tbl_producto` where `ProductoID` = $_ProductoID";
		$res = mysqli_query($Conn,$sql);
		if($res)
		{
			echo '<script>window.alert("Product has been successfully Deleted!"); window.open("Management_ProductsList.php","_self",null,true)</script>';
		}
	}

?>













