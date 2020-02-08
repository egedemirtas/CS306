
<?php
	session_start(); // remember the variables that are used. Use this in another page if you want to remember the variables that you get here.
				 $username = $_SESSION['username'];
	$link = mysqli_connect("localhost", "root", "", "cs306 project");

	if (isset($_POST['choiceThermal']))
	{
		$choiceThermal = mysql_real_escape_string($_POST['choiceThermal']);
		$mysql_result= mysqli_query($link," INSERT INTO `cartthermal` (`username`, `thermalName`) VALUES ('$username', '$choiceThermal'); ");
	}
	
	if (isset($_POST['deleteSingleThermal']))
	{
		$deleteSingleThermal = mysql_real_escape_string($_POST['deleteSingleThermal']);
		$mysql_result= mysqli_query($link," DELETE FROM `cartthermal` WHERE '$deleteSingleThermal' = `thermalName` AND '$username' = `username` ");
	}
	
	if (isset($_POST['deleteALL']))
	{
		$mysql_result= mysqli_query($link," DELETE FROM `cartthermal` WHERE '$username' = `username` ");
	}
	
	if (isset($_POST['editThermal']))
	{
		$Manufacturer = mysql_real_escape_string($_POST['Manufacturer']);
		$Name = mysql_real_escape_string($_POST['Name']);
		$Amount = mysql_real_escape_string($_POST['Amount']);
		$Price = mysql_real_escape_string($_POST['Price']);
		$editThermal = mysql_real_escape_string($_POST['editThermal']);
		$mysql_result= mysqli_query($link,"UPDATE `thermalcompound` SET `Manufacturer`='$Manufacturer',`Name`='$Name',`Amount`='$Amount',`Price`='$Price' WHERE `Name` = '$editThermal'");
		echo"<script>location.assign('selectThermal.php')</script>";
	}
	
	if (isset($_POST['deleteThermal']))
	{
		$deleteThermal = mysql_real_escape_string($_POST['deleteThermal']);
		$mysql_result= mysqli_query($link," DELETE FROM `thermalcompound` WHERE '$deleteThermal'= `Name`  ");
		echo"<script>location.assign('selectThermal.php')</script>";
	}
	
	if (isset($_POST['insertThermal']))
	{
		$Manufacturer = mysql_real_escape_string($_POST['Manufacturer']);
		$Name = mysql_real_escape_string($_POST['Name']);
		$Amount = mysql_real_escape_string($_POST['Amount']);
		$Price = mysql_real_escape_string($_POST['Price']);
		$mysql_result= mysqli_query($link,"INSERT INTO `thermalcompound`(`Manufacturer`, `Name`, `Amount`, `Price`) VALUES ('$Manufacturer','$Name','$Amount','$Price')");
		echo"<script>location.assign('selectThermal.php')</script>";
	}

	echo"<script>location.assign('welcome_page.php')</script>";
?>