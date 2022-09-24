<?php
	session_start();
	$conn = mysqli_connect("localhost","root","","db_swdp");
		if(!$conn)
			{
				die("Connection Failed" . mysqli_connect_error());
			}
	$_un = $_POST['Username'];
	$_pass = $_POST['Password'];
	$Rol = $_GET['Rol'];
	
		$query = "SELECT * FROM `tbl_cliente` WHERE `Username` = '".$_un."' and `Password` = '".$_pass."' and `Rol` = '".$Rol."'";
		$res = mysqli_query($conn,$query);
			if($res===false)
				{
					die("Error" . mysqli_error($conn));
				}
		$row = mysqli_fetch_array($res,MYSQLI_ASSOC);
			if($row)
				{
					if($Rol == "User")
					{
					$_SESSION["Username"] = $_un;
					$_SESSION["Password"] = $_pass;
					echo "<script>window.open('index.php','_self',null,true)</script>";
					die("Logged in");
					}
					else if($Rol == "Admin")
					{	$_SESSION['Admin'] = "Logged";
						echo "<script>window.open('Management_Orders.php','_self',null,true)</script>";
					}
				}
			else
				{
					die("Usuario o contraseña mal ingresada");
				}
?>
















