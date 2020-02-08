
<?php
	session_start(); // remember the variables that are used. Use this in another page if you want to remember the variables that you get here.
				 $username = $_SESSION['username'];
	$link = mysqli_connect("localhost", "root", "", "cs306 project");

	if (isset($_POST['choiceGPU']))
	{
		$choiceGPU = mysql_real_escape_string($_POST['choiceGPU']);
		$mysql_result= mysqli_query($link," INSERT INTO `cartvideo` (`username`, `videocard`) VALUES ('$username', '$choiceGPU'); ");
	}
	
	if (isset($_POST['deleteSingleGPU']))
	{
		$deleteSingleGPU = mysql_real_escape_string($_POST['deleteSingleGPU']);
		$mysql_result= mysqli_query($link," DELETE FROM `cartvideo` WHERE '$deleteSingleGPU' = `videocard` AND '$username' = `username` ");
	}
	
	if (isset($_POST['deleteALL']))
	{
		$mysql_result= mysqli_query($link," DELETE FROM `cartvideo` WHERE '$username' = `username` ");
	}
	
	if (isset($_POST['editGPU']))
	{
		$manufacturer = mysql_real_escape_string($_POST['manufacturer']);
		$chipset = mysql_real_escape_string($_POST['chipset']);
		$videoRAM = mysql_real_escape_string($_POST['videoRAM']);
		$interface = mysql_real_escape_string($_POST['interface']);
		$coreClock = mysql_real_escape_string($_POST['coreClock']);
		$cablePorts = mysql_real_escape_string($_POST['cablePorts']);
		$power = mysql_real_escape_string($_POST['power']);
		$price = mysql_real_escape_string($_POST['price']);
		$editGPU = mysql_real_escape_string($_POST['editGPU']);
		$mysql_result= mysqli_query($link,"UPDATE `videocards` SET `manufacturer`='$manufacturer',`chipset`='$chipset',`videoRAM`='$videoRAM',`interface`='$interface',`coreClock`='$coreClock',`cablePorts`='$cablePorts',`power`='$power',`price`='$price' WHERE CONCAT(manufacturer,' ',chipset) = '$editGPU'");
		echo"<script>location.assign('selectGPU.php')</script>";
	}
	
	if (isset($_POST['deleteGPU']))
	{
		$deleteGPU = mysql_real_escape_string($_POST['deleteGPU']);
		$mysql_result= mysqli_query($link," DELETE FROM `mother_compatible_video` WHERE '$deleteGPU'= CONCAT(videoManu,' ',videoChipset); ");
		$mysql_result= mysqli_query($link," DELETE FROM `monitor_compatible_video` WHERE '$deleteGPU'= CONCAT(videoManu,' ',videoChipset); ");
		$mysql_result= mysqli_query($link," DELETE FROM `videocards` WHERE '$deleteGPU'= CONCAT(manufacturer,' ',chipset)  ");
		echo"<script>location.assign('selectGPU.php')</script>";
	}
	
	if (isset($_POST['insertGPU']))
	{
		$manufacturer = mysql_real_escape_string($_POST['manufacturer']);
		$chipset = mysql_real_escape_string($_POST['chipset']);
		$videoRAM = mysql_real_escape_string($_POST['videoRAM']);
		$interface = mysql_real_escape_string($_POST['interface']);
		$coreClock = mysql_real_escape_string($_POST['coreClock']);
		$cablePorts = mysql_real_escape_string($_POST['cablePorts']);
		$power = mysql_real_escape_string($_POST['power']);
		$price = mysql_real_escape_string($_POST['price']);
		$mysql_result= mysqli_query($link,"INSERT INTO `videocards`(`manufacturer`, `chipset`, `videoRAM`, `interface`, `coreClock`, `cablePorts`, `power`, `price`) VALUES ('$manufacturer','$chipset','$videoRAM','$interface','$coreClock','$cablePorts','$power','$price')");
		echo"<script>location.assign('selectGPU.php')</script>";
	}
	echo"<script>location.assign('welcome_page.php')</script>";
?>