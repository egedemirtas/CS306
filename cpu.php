
<?php
	session_start(); // remember the variables that are used. Use this in another page if you want to remember the variables that you get here.
				 $username = $_SESSION['username'];
	$link = mysqli_connect("localhost", "root", "", "cs306 project");

	if (isset($_POST['choiceCPU']))
	{
		$choiceCPU = mysql_real_escape_string($_POST['choiceCPU']);
		$mysql_result= mysqli_query($link," INSERT INTO `cartcpu` (`username`, `cpuSeries`) VALUES ('$username', '$choiceCPU'); ");
	}
	
	if (isset($_POST['deleteSingleCPU']))
	{
		$deleteSingleCPU = mysql_real_escape_string($_POST['deleteSingleCPU']);
		$mysql_result= mysqli_query($link," DELETE FROM `cartcpu` WHERE '$deleteSingleCPU' = `cpuSeries` AND '$username' = `username` ");
	}
	
	if (isset($_POST['deleteALL']))
	{
		$mysql_result= mysqli_query($link," DELETE FROM `cartcpu` WHERE '$username' = `username` ");
	}
	
	if (isset($_POST['editCPU']))
	{
		$Manufacturer = mysql_real_escape_string($_POST['Manufacturer']);
		$Series = mysql_real_escape_string($_POST['Series']);
		$IntegratedGPU = mysql_real_escape_string($_POST['IntegratedGPU']);
		$Socket = mysql_real_escape_string($_POST['Socket']);
		$CoreNumber = mysql_real_escape_string($_POST['CoreNumber']);
		$Speed = mysql_real_escape_string($_POST['Speed']);
		$Power = mysql_real_escape_string($_POST['Power']);
		$Price = mysql_real_escape_string($_POST['Price']);
		$editCPU = mysql_real_escape_string($_POST['editCPU']);
		$mysql_result= mysqli_query($link,"UPDATE `cpu` SET `Manufacturer`='$Manufacturer',`Series`='$Series',`IntegratedGPU`='$IntegratedGPU',`Socket`='$Socket',`CoreNum`='$CoreNumber',`Speed`='$Speed',`Power`='$Power',`Price`='$Price' WHERE `Series` = '$editCPU'");
		echo"<script>location.assign('selectCPU.php')</script>";
	}
	
	if (isset($_POST['deleteCPU']))
	{
		$deleteCPU = mysql_real_escape_string($_POST['deleteCPU']);
		$mysql_result= mysqli_query($link," DELETE FROM `mother_compatible_cpu` WHERE '$deleteCPU'= `cpuSeries`; ");
		$mysql_result= mysqli_query($link," DELETE FROM `cpu` WHERE '$deleteCPU'= `Series`  ");
		echo"<script>location.assign('selectCPU.php')</script>";
	}
	
	if (isset($_POST['insertCPU']))
	{
		$Manufacturer = mysql_real_escape_string($_POST['Manufacturer']);
		$Series = mysql_real_escape_string($_POST['Series']);
		$IntegratedGPU = mysql_real_escape_string($_POST['IntegratedGPU']);
		$Socket = mysql_real_escape_string($_POST['Socket']);
		$CoreNumber = mysql_real_escape_string($_POST['CoreNumber']);
		$Speed = mysql_real_escape_string($_POST['Speed']);
		$Power = mysql_real_escape_string($_POST['Power']);
		$Price = mysql_real_escape_string($_POST['Price']);
		$mysql_result= mysqli_query($link,"INSERT INTO `cpu`(`Manufacturer`, `Series`, `IntegratedGPU`, `Socket`, `CoreNum`, `Speed`, `Power`, `Price`) VALUES ('$Manufacturer','$Series','$IntegratedGPU','$Socket','$CoreNumber','$Speed','$Power','$Price')");
		echo"<script>location.assign('selectCPU.php')</script>";
	}

	echo"<script>location.assign('welcome_page.php')</script>";
?>