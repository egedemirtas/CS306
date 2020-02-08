
<?php
	session_start(); // remember the variables that are used. Use this in another page if you want to remember the variables that you get here.
				 $username = $_SESSION['username'];
	$link = mysqli_connect("localhost", "root", "", "cs306 project");

	if (isset($_POST['choicePSU']))
	{
		$choicePSU = mysql_real_escape_string($_POST['choicePSU']);
		$mysql_result= mysqli_query($link," INSERT INTO `cartPSU` (`username`, `name`) VALUES ('$username', '$choicePSU'); ");
	}
	
	if (isset($_POST['deleteSinglePSU']))
	{
		$deleteSinglePSU = mysql_real_escape_string($_POST['deleteSinglePSU']);
		$mysql_result= mysqli_query($link," DELETE FROM `cartPSU` WHERE '$deleteSinglePSU' = `name` AND '$username' = `username` ");
	}
	
	if (isset($_POST['deleteALL']))
	{
		$mysql_result= mysqli_query($link," DELETE FROM `cartPSU` WHERE '$username' = `username` ");
	}
	
	if (isset($_POST['editPSU']))
	{
		$Manufacturer = mysql_real_escape_string($_POST['Manufacturer']);
		$name = mysql_real_escape_string($_POST['name']);
		$MaxPower = mysql_real_escape_string($_POST['MaxPower']);
		$Modular = mysql_real_escape_string($_POST['Modular']);
		$PStype = mysql_real_escape_string($_POST['PStype']);
		$Price = mysql_real_escape_string($_POST['Price']);
		$editPSU = mysql_real_escape_string($_POST['editPSU']);
		$mysql_result= mysqli_query($link,"UPDATE `powersupply` SET `Manufacturer`='$Manufacturer',`name`='$name',`MaxPower`='$MaxPower',`Modular`='$Modular',`PStype`='$PStype',`Price`='$Price' WHERE `name` = '$editPSU'");
		echo"<script>location.assign('selectPSU.php')</script>";
	}
	
	if (isset($_POST['deletePSU']))
	{
		$deletePSU = mysql_real_escape_string($_POST['deletePSU']);
		$mysql_result= mysqli_query($link," DELETE FROM `powersupply` WHERE '$deletePSU'= `name`  ");
		echo"<script>location.assign('selectPSU.php')</script>";
	}
	
	if (isset($_POST['insertPSU']))
	{
		$Manufacturer = mysql_real_escape_string($_POST['Manufacturer']);
		$name = mysql_real_escape_string($_POST['name']);
		$MaxPower = mysql_real_escape_string($_POST['MaxPower']);
		$Modular = mysql_real_escape_string($_POST['Modular']);
		$PStype = mysql_real_escape_string($_POST['PStype']);
		$Price = mysql_real_escape_string($_POST['Price']);
		$editPSU = mysql_real_escape_string($_POST['editPSU']);
		$mysql_result= mysqli_query($link,"INSERT INTO `powersupply`(`Manufacturer`, `name`, `MaxPower`, `Modular`, `PStype`, `Price`) VALUES ('$Manufacturer','$name','$MaxPower','$Modular','$PStype','$Price')");
		echo"<script>location.assign('selectPSU.php')</script>";
	}

	echo"<script>location.assign('welcome_page.php')</script>";
?>