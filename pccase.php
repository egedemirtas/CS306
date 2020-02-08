
<?php
	session_start(); // remember the variables that are used. Use this in another page if you want to remember the variables that you get here.
				 $username = $_SESSION['username'];
	$link = mysqli_connect("localhost", "root", "", "cs306 project");

	if (isset($_POST['choicePCCase']))
	{
		$choicePCCase= mysql_real_escape_string($_POST['choicePCCase']);
		$mysql_result= mysqli_query($link," INSERT INTO `cartPCcase` (`username`, `pccaseName`) VALUES ('$username', '$choicePCCase'); ");
	}
	
	if (isset($_POST['deleteSinglePCCase']))
	{
		$deleteSinglePCCase = mysql_real_escape_string($_POST['deleteSinglePCCase']);
		$mysql_result= mysqli_query($link," DELETE FROM `cartPCcase` WHERE '$deleteSinglePCCase' = `pccaseName` AND '$username' = `username` ");
	}
	
	if (isset($_POST['deleteALL']))
	{
		$mysql_result= mysqli_query($link," DELETE FROM `cartPCcase` WHERE '$username' = `username` ");
	}
	
	if (isset($_POST['editPCCase']))
	{
		$Manufacturer = mysql_real_escape_string($_POST['caseManuf']);
		$Name = mysql_real_escape_string($_POST['caseName']);
		$Type = mysql_real_escape_string($_POST['caseType']);
		$mbFormFactor = mysql_real_escape_string($_POST['mbFormFactor']);
		$Price = mysql_real_escape_string($_POST['casePrice']);
		$editPCCase= mysql_real_escape_string($_POST['editPCCase']);
		$mysql_result= mysqli_query($link,"UPDATE `pccase` SET `caseManuf`='$Manufacturer', `caseName`='$Name',`caseType`='$Type',`mbFormFactor`='$mbFormFactor',`casePrice`='$Price' WHERE `caseName` = '$editPCCase'");
		echo"<script>location.assign('selectPCCase.php')</script>";
	}
	
	if (isset($_POST['deletePCCase']))
	{
		$deletePCCase= mysql_real_escape_string($_POST['deletePCCase']);
		$mysql_result= mysqli_query($link," DELETE FROM `compatible_form_factor` WHERE '$deletePCCase'= `caseName`; ");
		$mysql_result= mysqli_query($link," DELETE FROM `formfactor_comp_typepowersupp` WHERE '$deletePCCase'= `caseName`; ");
		$mysql_result= mysqli_query($link," DELETE FROM `pccase` WHERE '$deletePCCase'= `caseName`;  ");
		echo"<script>location.assign('selectPCCase.php')</script>";
	}
	
	if (isset($_POST['insertPCCase']))
	{
		$Manufacturer = mysql_real_escape_string($_POST['caseManuf']);
		$Name = mysql_real_escape_string($_POST['caseName']);
		$Type = mysql_real_escape_string($_POST['caseType']);
		$mbFormFactor = mysql_real_escape_string($_POST['mbFormFactor']);
		$Price = mysql_real_escape_string($_POST['casePrice']);
		$mysql_result= mysqli_query($link,"INSERT INTO `pccase`(`caseManuf`, `caseName`, `caseType`, `mbFormFactor`, `casePrice`) VALUES ('$Manufacturer','$Name','$Type','$mbFormFactor','$Price')");
		echo"<script>location.assign('selectPCCase.php')</script>";
	}

	echo"<script>location.assign('welcome_page.php')</script>";
?>