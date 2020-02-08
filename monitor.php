<?php
	session_start(); // remember the variables that are used. Use this in another page if you want to remember the variables that you get here.
				 $username = $_SESSION['username'];
	$link = mysqli_connect("localhost", "root", "", "cs306 project");

	if (isset($_POST['choiceMonitor']))
	{
		$choiceMonitor = mysql_real_escape_string($_POST['choiceMonitor']);
		$mysql_result= mysqli_query($link," INSERT INTO `cartMonitor` (`username`, `monitorName`) VALUES ('$username', '$choiceMonitor'); ");
	}
	
	if (isset($_POST['deleteSingleMonitor']))
	{
		$deleteSingleMonitor = mysql_real_escape_string($_POST['deleteSingleMonitor']);
		$mysql_result= mysqli_query($link," DELETE FROM `cartMonitor` WHERE '$deleteSingleMonitor' = `monitorName` AND '$username' = `username` ");
	}
	
	if (isset($_POST['deleteALL']))
	{
		$mysql_result= mysqli_query($link," DELETE FROM `cartMonitor` WHERE '$username' = `username` ");
	}
	
	if (isset($_POST['editMonitor']))
	{
		$monitorManuf = mysql_real_escape_string($_POST['monitorManuf']);
		$monitorName = mysql_real_escape_string($_POST['monitorName']);
		$resolution = mysql_real_escape_string($_POST['resolution']);
		$monSize = mysql_real_escape_string($_POST['monSize']);
		$responseTime = mysql_real_escape_string($_POST['responseTime']);
		$refreshRate = mysql_real_escape_string($_POST['refreshRate']);
		$aspectRatio = mysql_real_escape_string($_POST['aspectRatio']);
		$monInterface = mysql_real_escape_string($_POST['monInterface']);
		$monPrice = mysql_real_escape_string($_POST['monPrice']);
		$editMonitor = mysql_real_escape_string($_POST['editMonitor']);
		$mysql_result= mysqli_query($link,"UPDATE `monitor` SET `monitorManuf`='$monitorManuf',`monitorName`='$monitorName',`resolution`='$resolution',`monSize`='$monSize',`responseTime`='$responseTime',`refreshRate`='$refreshRate',`aspectRatio`='$aspectRatio',`monInterface`='$monInterface',`monPrice`='$monPrice' WHERE `monitorName` = '$editMonitor'");
		echo"<script>location.assign('selectMonitor.php')</script>";
	}
	
	if (isset($_POST['deleteMonitor']))
	{
		$deleteMonitor = mysql_real_escape_string($_POST['deleteMonitor']);
		$mysql_result= mysqli_query($link," DELETE FROM `monitor_compatible_video` WHERE '$deleteMonitor'= `monitorName`; ");
		$mysql_result= mysqli_query($link," DELETE FROM `monitor` WHERE '$deleteMonitor'= `monitorName`  ");
		echo"<script>location.assign('selectMonitor.php')</script>";
	}
	
	if (isset($_POST['insertMonitor']))
	{
		$monitorManuf = mysql_real_escape_string($_POST['monitorManuf']);
		$monitorName = mysql_real_escape_string($_POST['monitorName']);
		$resolution = mysql_real_escape_string($_POST['resolution']);
		$monSize = mysql_real_escape_string($_POST['monSize']);
		$responseTime = mysql_real_escape_string($_POST['responseTime']);
		$refreshRate = mysql_real_escape_string($_POST['refreshRate']);
		$aspectRatio = mysql_real_escape_string($_POST['aspectRatio']);
		$monInterface = mysql_real_escape_string($_POST['monInterface']);
		$monPrice = mysql_real_escape_string($_POST['monPrice']);
		$insertMonitor = mysql_real_escape_string($_POST['insertMonitor']);
		$mysql_result= mysqli_query($link,"INSERT INTO `monitor`(`monitorManuf`, `monitorName`, `resolution`, `monSize`, `responseTime`, `refreshRate`, `aspectRatio`, `monInterface` , `monPrice`) VALUES ('$monitorManuf','$monitorName','$resolution','$monSize','$responseTime','$refreshRate','$aspectRatio','$monInterface', '$monPrice')");
		echo"<script>location.assign('selectMonitor.php')</script>";
	}

	echo"<script>location.assign('welcome_page.php')</script>";
?>