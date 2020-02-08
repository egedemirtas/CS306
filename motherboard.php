
<?php
	session_start(); // remember the variables that are used. Use this in another page if you want to remember the variables that you get here.
	 $username = $_SESSION['username'];
	$link = mysqli_connect("localhost", "root", "", "cs306 project");

	if (isset($_POST['choiceMotherboard']))
	{
		$choiceMotherboard = mysql_real_escape_string($_POST['choiceMotherboard']);
		$mysql_result= mysqli_query($link," INSERT INTO `cartmotherboard` (`username`, `motherName`) VALUES ('$username', '$choiceMotherboard'); ");
	}
	
	if (isset($_POST['deleteSingleMotherboard']))
	{
		$deleteSingleMotherboard = mysql_real_escape_string($_POST['deleteSingleMotherboard']);
		$mysql_result= mysqli_query($link," DELETE FROM `cartmotherboard` WHERE '$deleteSingleMotherboard' = `motherName` AND '$username' = `username` ");
	}
	
	if (isset($_POST['deleteALL']))
	{
		$mysql_result= mysqli_query($link," DELETE FROM `cartmotherboard` WHERE '$username' = `username` ");
	}
	
	if (isset($_POST['editMotherboard']))
	{
		$Name = mysql_real_escape_string($_POST['name']);
		$Socket = mysql_real_escape_string($_POST['socket']);
		$FormFactor = mysql_real_escape_string($_POST['formFactor']);
		$Chipset = mysql_real_escape_string($_POST['chipset']);
		$SATA = mysql_real_escape_string($_POST['SATA']);
		$ramSlot = mysql_real_escape_string($_POST['ramSlot']);
		$maxRam = mysql_real_escape_string($_POST['maxRam']);
		$ramType = mysql_real_escape_string($_POST['ramType']);
		$PCIEslots = mysql_real_escape_string($_POST['PCIESlots']);		
		$Price = mysql_real_escape_string($_POST['price']);
		$editMotherboard = mysql_real_escape_string($_POST['editMotherboard']);
		$mysql_result= mysqli_query($link,"UPDATE `motherboard` SET `name`='$Name',`socket`='$Socket',`formFactor`='$FormFactor',`chipset`='$Chipset',`SATA`='$SATA',`ramSlot`='$ramSlot',`maxRam`='$maxRam',`ramType`='$ramType',`PCIESlots`='$PCIEslots',`price`='$Price' WHERE `name` = '$editMotherboard'");
		echo"<script>location.assign('selectMotherboard.php')</script>";
	}
	
	if (isset($_POST['deleteMotherboard']))
	{
		$deleteMotherboard = mysql_real_escape_string($_POST['deleteMotherboard']);
		$mysql_result= mysqli_query($link," DELETE FROM `mother_compatible_cpu` WHERE '$deleteMotherboard'= `motherboardName`; ");
		$mysql_result= mysqli_query($link," DELETE FROM `compatible_form_factor` WHERE '$deleteMotherboard'= `motherboardName`; ");
		$mysql_result= mysqli_query($link," DELETE FROM `mother_compatible_storage` WHERE '$deleteMotherboard'= `motherboardName`; ");
		$mysql_result= mysqli_query($link," DELETE FROM `mother_compatible_video` WHERE '$deleteMotherboard'= `motherboardName`; ");
		$mysql_result= mysqli_query($link," DELETE FROM `mother_compatible_ram` WHERE '$deleteMotherboard'= `motherboardName`; ");
		$mysql_result= mysqli_query($link," DELETE FROM `motherboard` WHERE '$deleteMotherboard'= `name`; ");
		echo"<script>location.assign('selectMotherboard.php')</script>";
	}
	
	if (isset($_POST['insertMotherboard']))
	{
		$Name = mysql_real_escape_string($_POST['name']);
		$Socket = mysql_real_escape_string($_POST['socket']);
		$FormFactor = mysql_real_escape_string($_POST['formFactor']);
		$Chipset = mysql_real_escape_string($_POST['chipset']);
		$SATA = mysql_real_escape_string($_POST['SATA']);
		$ramSlot = mysql_real_escape_string($_POST['ramSlot']);
		$maxRam = mysql_real_escape_string($_POST['maxRam']);
		$ramType = mysql_real_escape_string($_POST['ramType']);
		$PCIEslots = mysql_real_escape_string($_POST['PCIESlots']);		
		$Price = mysql_real_escape_string($_POST['price']);
		$insertMotherboard = mysql_real_escape_string($_POST['insertMotherboard']);
		$mysql_result= mysqli_query($link,"INSERT INTO `motherboard` (`name`, `socket`, `formFactor`, `chipset`, `SATA`, `ramSlot`, `maxRam`,`ramType`,`PCIESlots`, `price`) VALUES ('$Name','$Chipset','$FormFactor','$Socket','$SATA','$ramSlot','$maxRam','$ramType','$PCIEslots','$Price')");
		echo"<script>location.assign('selectMotherboard.php')</script>";
	}
	echo"<script>location.assign('welcome_page.php')</script>";
?>