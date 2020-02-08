
<?php
	session_start(); // remember the variables that are used. Use this in another page if you want to remember the variables that you get here.
				 $username = $_SESSION['username'];
	$link = mysqli_connect("localhost", "root", "", "cs306 project");

	if (isset($_POST['choiceRAM']))
	{
		$choiceRAM = mysql_real_escape_string($_POST['choiceRAM']);
		$mysql_result= mysqli_query($link," INSERT INTO `cartram` (`username`, `RAMname`) VALUES ('$username', '$choiceRAM'); ");
	}
	
	if (isset($_POST['deleteSingleRAM']))
	{
		$deleteSingleRAM = mysql_real_escape_string($_POST['deleteSingleRAM']);
		$mysql_result= mysqli_query($link," DELETE FROM `cartram` WHERE '$deleteSingleRAM' = `RAMname` AND '$username' = `username` ");
	}
	
	if (isset($_POST['deleteALL']))
	{
		$mysql_result= mysqli_query($link," DELETE FROM `cartram` WHERE '$username' = `username` ");
	}
	
	if (isset($_POST['editRAM']))
	{
		$manufacturer = mysql_real_escape_string($_POST['manufacturer']);
		$name = mysql_real_escape_string($_POST['name']);
		$speed = mysql_real_escape_string($_POST['speed']);
		$size = mysql_real_escape_string($_POST['size']);
		$price = mysql_real_escape_string($_POST['price']);
		$editRAM = mysql_real_escape_string($_POST['editRAM']);
		$mysql_result= mysqli_query($link,"UPDATE `ram` SET `manufacturer`='$manufacturer',`name`='$name',`speed`='$speed',`size`='$size',`price`='$price' WHERE `name` = '$editRAM'");
		echo"<script>location.assign('selectRAM.php')</script>";
	}
	
	if (isset($_POST['deleteRAM']))
	{
		$deleteRAM = mysql_real_escape_string($_POST['deleteRAM']);
		$mysql_result= mysqli_query($link," DELETE FROM `mother_compatible_ram` WHERE '$deleteRAM'= `ramName`; ");
		$mysql_result= mysqli_query($link," DELETE FROM `ram` WHERE '$deleteRAM'= `name`  ");
		echo"<script>location.assign('selectRAM.php')</script>";
	}
	
	if (isset($_POST['insertRAM']))
	{
		$manufacturer = mysql_real_escape_string($_POST['manufacturer']);
		$name = mysql_real_escape_string($_POST['name']);
		$speed = mysql_real_escape_string($_POST['speed']);
		$size = mysql_real_escape_string($_POST['size']);
		$price = mysql_real_escape_string($_POST['price']);
		$insertRAM = mysql_real_escape_string($_POST['insertRAM']);
		$mysql_result= mysqli_query($link,"INSERT INTO `ram`(`manufacturer`, `name`, `speed`, `size`, `price`) VALUES ('$manufacturer','$name','$speed','$size','$price')");
		echo"<script>location.assign('selectRAM.php')</script>";
	}

	echo"<script>location.assign('welcome_page.php')</script>";
?>