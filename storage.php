
<?php
	session_start(); // remember the variables that are used. Use this in another page if you want to remember the variables that you get here.
				 $username = $_SESSION['username'];
	$link = mysqli_connect("localhost", "root", "", "cs306 project");

	if (isset($_POST['choiceStorage']))
	{
		$choiceStorage = mysql_real_escape_string($_POST['choiceStorage']);
		$mysql_result= mysqli_query($link," INSERT INTO `cartstorage` (`username`, `storageName`) VALUES ('$username', '$choiceStorage'); ");
	}
	
	if (isset($_POST['deleteSingleStorage']))
	{
		$deleteSingleStorage = mysql_real_escape_string($_POST['deleteSingleStorage']);
		$mysql_result= mysqli_query($link," DELETE FROM `cartstorage` WHERE '$deleteSingleStorage' = `storageName` AND '$username' = `username` ");
	}
	
	if (isset($_POST['deleteALL']))
	{
		$mysql_result= mysqli_query($link," DELETE FROM `cartstorage` WHERE '$username' = `username` ");
	}
	
	if (isset($_POST['editStorage']))
	{
		$Manufacturer = mysql_real_escape_string($_POST['Manufacturer']);
		$Type = mysql_real_escape_string($_POST['Type']);
		$Name = mysql_real_escape_string($_POST['Name']);
		$Interface = mysql_real_escape_string($_POST['Interface']);
		$Size = mysql_real_escape_string($_POST['Size']);
		$Price = mysql_real_escape_string($_POST['Price']);
		$editStorage = mysql_real_escape_string($_POST['editStorage']);
		$mysql_result= mysqli_query($link,"UPDATE `storage` SET `Manufacturer`='$Manufacturer',`Type`='$Type',`Name`='$Name',`Interface`='$Interface',`Size`='$Size',`Price`='$Price' WHERE `Name` = '$editStorage'");
		echo"<script>location.assign('selectStorage.php')</script>";
	}
	
	if (isset($_POST['deleteStorage']))
	{
		$deleteCPU = mysql_real_escape_string($_POST['deleteStorage']);
		$mysql_result= mysqli_query($link," DELETE FROM `mother_compatible_storage` WHERE '$deleteCPU'= `storageName`; ");
		$mysql_result= mysqli_query($link," DELETE FROM `storage` WHERE '$deleteCPU'= `Name`  ");
		echo"<script>location.assign('selectStorage.php')</script>";
	}
	
	if (isset($_POST['insertStorage']))
	{
		$Manufacturer = mysql_real_escape_string($_POST['Manufacturer']);
		$Type = mysql_real_escape_string($_POST['Type']);
		$Name = mysql_real_escape_string($_POST['Name']);
		$Interface = mysql_real_escape_string($_POST['Interface']);
		$Size = mysql_real_escape_string($_POST['Size']);
		$Price = mysql_real_escape_string($_POST['Price']);
		$mysql_result= mysqli_query($link,"INSERT INTO `storage`(`Manufacturer`, `Type`, `Name`, `Interface`, `Size`, `Price`) VALUES ('$Manufacturer','$Type','$Name','$Interface','$Size','$Price')");
		echo"<script>location.assign('selectStorage.php')</script>";
	}

	echo"<script>location.assign('welcome_page.php')</script>";
?>