<?php
	
	require 'Connection.php';
	
	$ActionType = $_GET['ActionType'];
	$Location = $_GET["Loc"];
	$Username = $_POST['Username'];
	$Password = $_POST['Password'];
	$Nombrecliente = $_POST['Nombrecliente'];
	$Appaterno = $_POST['Appaterno'];
	$Ammaterno = $_POST['Ammaterno'];
	$Direccion = $_POST['Direccion'];
	$Email = $_POST['Email'];
	
	if(empty($Username) || empty($Password) || empty($Nombrecliente) || empty($Appaterno) || empty($Ammaterno) || empty($Direccion) || empty($Email))
	{
		echo '<script>window.alert("Cannot leave the page blank"); window.open("register.php","_self",null,true);</script>';
	}
	else
	{
		if($ActionType == "Register")
		{
			$sql = "INSERT INTO `tbl_cliente`(`Username`,`Password`,`Rol`,`Nombrecliente`, `Appaterno`, `Ammaterno`, `Direccion`, `Email`)" .
					" VALUES ('$Username','$Password','User','$Nombrecliente','$Appaterno','$Ammaterno','$Direccion','$Email')";
			$res = mysqli_query($Conn,$sql);
			if(!$res)
			{
				echo "Failed " . mysqli_connect_error();
			}else
			{
				echo '<script>window.alert("Registro Completado Por favor Ingresar"); window.open("Login.php?Rol=User","_self",null,true);</script>'; 
			}
		}
		else
		{
			$ID = $_GET['ID'];
			$sqlI = "UPDATE `tbl_cliente` SET `Username`='$Username',`Password`='$Password',`Nombrecliente`='$Nombrecliente'," .
			"`Appaterno`='$Appaterno',`Ammaterno`='$Ammaterno',`Direccion`='$Direccion',`Email`='$Email' WHERE ClienteID = $ID";
			$res = mysqli_query($Conn,$sqlI);
			if(!$res)
			{
				echo "Failed " . mysqli_connect_error();
			}else
			{	
				if($Location == "MA"){
				echo '<script>window.open("ManageAccount.php","_self",null,true);</script>';}
				else if($Location == "MC"){
				echo '<script>window.open("Management_Customers.php","_self",null,true);</script>';}
			}
		}
		
	}

?>















