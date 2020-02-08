<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="welcome_page.php">
			    	<img src="fan.png" width="30" height="30" class="d-inline-block align-top" alt="">
					PComp
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
				    <ul class="navbar-nav mr-auto">
				      	<li class="nav-item active">
				        	<a class="nav-link" href="welcome_page.php">Cart <span class="sr-only">(current)</span></a>
						</li>
				    </ul>
				    <span class="navbar-text">
						<a class="nav-link" href="login_page.html">Logout</a>
					</span>
			  </div>
			</div>
		</nav>

		<div class="container">
			<div class="col-lg-12">
			<h1 class="h1"> Results </h1>
				<table class="table table-striped table-hover">
						<thead class="thead-dark">
							<tr class="success">
								<th>Reports</th>
							</tr>
						</thead>

						<tbody>
							<?php
							session_start();
							$username = $_SESSION['username'];
							$link = mysqli_connect("localhost", "root", "", "cs306 project");

							$combs = mysqli_query($link," SELECT cartcpu.cpuSeries, cartmotherboard.motherName FROM cartcpu, cartmotherboard WHERE '$username' = cartcpu.username AND '$username' = cartmotherboard.username; ");
							$myarr=array();
							while($row = mysqli_fetch_array($combs)){
								array_push($myarr, $row);
							}
							$row_number=count($myarr);

							for($j=0;$j<$row_number;$j++)
							{
								$result = mysqli_query($link," SELECT * FROM mother_compatible_cpu WHERE '".$myarr[$j]['cpuSeries']."' = mother_compatible_cpu.cpuSeries AND '".$myarr[$j]['motherName']."' = mother_compatible_cpu.motherboardName ; ");
								$myarr1=array();
								while($row = mysqli_fetch_array($result)){
									array_push($myarr1, $row);
								}
								$row_number1=count($myarr1);
								for($k=0;$k<$row_number1;$k++){
									echo "<tr>";
									echo"<td> ".$myarr1[$k]['cpuSeries']."  is compatible with  ".$myarr1[$k]['motherboardName']." </td>";
									echo "</tr>";
								}
							}


							$combs1 = mysqli_query($link," SELECT cartram.RAMname, cartmotherboard.motherName FROM cartram, cartmotherboard WHERE '$username' = cartram.username AND '$username' = cartmotherboard.username; ");
							$myarr1=array();
							while($row = mysqli_fetch_array($combs1)){
								array_push($myarr1, $row);
							}
							$row_number1=count($myarr1);

							for($j=0;$j<$row_number1;$j++)
							{
								$result1 = mysqli_query($link," SELECT * FROM mother_compatible_ram WHERE '".$myarr1[$j]['RAMname']."' = mother_compatible_ram.ramName AND '".$myarr1[$j]['motherName']."' = mother_compatible_ram.motherboardName ; ");
								$myarr2=array();
								while($row = mysqli_fetch_array($result1)){
									array_push($myarr2, $row);
								}
								$row_number2=count($myarr2);
								for($k=0;$k<$row_number2;$k++){
									echo "<tr>";
									echo"<td> ".$myarr2[$k]['ramName']."  is compatible with  ".$myarr2[$k]['motherboardName']." </td>";
									echo "</tr>";
								}
							}


							$combs2 = mysqli_query($link," SELECT cartvideo.videocard, cartmotherboard.motherName FROM cartvideo, cartmotherboard WHERE '$username' = cartmotherboard.username AND '$username' = cartvideo.username; ");
							$myarr1=array();
							while($row = mysqli_fetch_array($combs2)){
								array_push($myarr1, $row);
							}
							$row_number1=count($myarr1);

							for($j=0;$j<$row_number1;$j++)
							{
								$result1 = mysqli_query($link," SELECT * FROM mother_compatible_video WHERE '".$myarr1[$j]['videocard']."' = CONCAT(mother_compatible_video.videoManu,' ',mother_compatible_video.videoChipset) AND '".$myarr1[$j]['motherName']."' = mother_compatible_video.motherboardName ; ");
								$myarr2=array();
								while($row = mysqli_fetch_array($result1)){
									array_push($myarr2, $row);
								}
								$row_number2=count($myarr2);
								for($k=0;$k<$row_number2;$k++){
									echo "<tr>";
									echo"<td> " .$myarr2[$k]['videoManu']. " " .$myarr2[$k]['videoChipset']. "  is compatible with  ".$myarr2[$k]['motherboardName']." </td>";
									echo "</tr>";
								}
							}


							$combs = mysqli_query($link," SELECT cartpccase.pccaseName, cartmotherboard.motherName FROM cartpccase, cartmotherboard WHERE '$username' = cartpccase.username AND '$username' = cartmotherboard.username; ");
							$myarr=array();
							while($row = mysqli_fetch_array($combs)){
								array_push($myarr, $row);
							}
							$row_number=count($myarr);

							for($j=0;$j<$row_number;$j++)
							{
								$result = mysqli_query($link," SELECT * FROM compatible_form_factor WHERE '".$myarr[$j]['pccaseName']."' = compatible_form_factor.caseName AND '".$myarr[$j]['motherName']."' = compatible_form_factor.motherboardName ; ");
								$myarr1=array();
								while($row = mysqli_fetch_array($result)){
									array_push($myarr1, $row);
								}
								$row_number1=count($myarr1);
								for($k=0;$k<$row_number1;$k++){
									echo "<tr>";
									echo"<td> ".$myarr1[$k]['caseName']."  is compatible with  ".$myarr1[$k]['motherboardName']." </td>";
									echo "</tr>";
								}
							}


							$combs2 = mysqli_query($link," SELECT cartvideo.videocard, cartmonitor.monitorName FROM cartvideo, cartmonitor WHERE '$username' = cartmonitor.username AND '$username' = cartvideo.username; ");
							$myarr1=array();
							while($row = mysqli_fetch_array($combs2)){
								array_push($myarr1, $row);
							}
							$row_number1=count($myarr1);

							for($j=0;$j<$row_number1;$j++)
							{
								$result1 = mysqli_query($link," SELECT * FROM monitor_compatible_video WHERE '".$myarr1[$j]['videocard']."' = CONCAT(monitor_compatible_video.videoManu,' ',monitor_compatible_video.videoChipset) AND '".$myarr1[$j]['monitorName']."' = monitor_compatible_video.monitorName ; ");
								$myarr2=array();
								while($row = mysqli_fetch_array($result1)){
									array_push($myarr2, $row);
								}
								$row_number2=count($myarr2);
								for($k=0;$k<$row_number2;$k++){
									echo "<tr>";
									echo"<td> " .$myarr2[$k]['videoManu']. " " .$myarr2[$k]['videoChipset']. "  is compatible with  ".$myarr2[$k]['monitorName']." </td>";
									echo "</tr>";
								}
							}


							$combs = mysqli_query($link," SELECT cartstorage.storageName, cartmotherboard.motherName FROM cartstorage, cartmotherboard WHERE '$username' = cartstorage.username AND '$username' = cartmotherboard.username; ");
							$myarr=array();
							while($row = mysqli_fetch_array($combs)){
								array_push($myarr, $row);
							}
							$row_number=count($myarr);

							for($j=0;$j<$row_number;$j++)
							{
								$result = mysqli_query($link," SELECT * FROM mother_compatible_storage WHERE '".$myarr[$j]['storageName']."' = mother_compatible_storage.storageName AND '".$myarr[$j]['motherName']."' = mother_compatible_storage.motherboardName ; ");
								$myarr1=array();
								while($row = mysqli_fetch_array($result)){
									array_push($myarr1, $row);
								}
								$row_number1=count($myarr1);
								for($k=0;$k<$row_number1;$k++){
									echo "<tr>";
									echo"<td> ".$myarr1[$k]['storageName']."  is compatible with  ".$myarr1[$k]['motherboardName']." </td>";
									echo "</tr>";
								}
							}


							$combs = mysqli_query($link," SELECT cartpccase.pccaseName, cartpsu.name FROM cartpccase, cartpsu WHERE '$username' = cartpccase.username AND '$username' = cartpsu.username; ");
							$myarr=array();
							while($row = mysqli_fetch_array($combs)){
								array_push($myarr, $row);
							}
							$row_number=count($myarr);

							for($j=0;$j<$row_number;$j++)
							{
								$result = mysqli_query($link," SELECT * FROM formfactor_comp_typepowersupp WHERE '".$myarr[$j]['pccaseName']."' = formfactor_comp_typepowersupp.caseName AND '".$myarr[$j]['name']."' = formfactor_comp_typepowersupp.name ; ");
								$myarr1=array();
								while($row = mysqli_fetch_array($result)){
									array_push($myarr1, $row);
								}
								$row_number1=count($myarr1);
								for($k=0;$k<$row_number1;$k++){
									echo "<tr>";
									echo"<td> ".$myarr1[$k]['caseName']."  is compatible with  ".$myarr1[$k]['name']." </td>";
									echo "</tr>";
								}
							}
							?>


						</tbody>
				</table>
			</div>

			<div class="col-lg-12">
			<h1 class="h1"> Total Price </h1>
				<table class="table table-striped table-hover">

						<tbody>
							<?php
								$totalprice = 0.0;
								$price = "";
								$username = $_SESSION['username'];
								$cpus = mysqli_query($link," SELECT * FROM cartcpu WHERE '$username' = `username`; ");
								$myarr=array();
								while($row = mysqli_fetch_array($cpus)){
									array_push($myarr, $row);
								}
								$row_number=count($myarr);

								for($i=0;$i<$row_number;$i++){
									$cpuPrices = mysqli_query($link," SELECT * FROM `cpu` WHERE '".$myarr[$i]['cpuSeries']."' = `Series`; ");
									$myarr1=array();
									while($row = mysqli_fetch_array($cpuPrices)){
										array_push($myarr1, $row);
									}
									$row_number1=count($myarr1);
									for($k=0;$k<$row_number1;$k++){
										$price = "".$myarr1[$k]['Price']."";
										$totalprice = $totalprice + (double)$price;
									}
								}
							?>
							<?php
								$monitors = mysqli_query($link," SELECT * FROM cartmonitor WHERE '$username' = `username`; ");
								$myarr=array();
								while($row = mysqli_fetch_array($monitors)){
									array_push($myarr, $row);
								}
								$row_number=count($myarr);

								for($i=0;$i<$row_number;$i++){
									$monitorPrices = mysqli_query($link," SELECT * FROM `monitor` WHERE '".$myarr[$i]['monitorName']."' = `monitorName`; ");
									$myarr1=array();
									while($row = mysqli_fetch_array($monitorPrices)){
										array_push($myarr1, $row);
									}
									$row_number1=count($myarr1);
									for($k=0;$k<$row_number1;$k++){
										$price = "".$myarr1[$k]['monPrice']."";
										$totalprice = $totalprice + (double)$price;
									}
								}

							?>
							<?php
								$cpus = mysqli_query($link," SELECT * FROM `cartmotherboard` WHERE '$username' = `username`; ");
								$myarr=array();
								while($row = mysqli_fetch_array($cpus)){
									array_push($myarr, $row);
								}
								$row_number=count($myarr);

								for($i=0;$i<$row_number;$i++){
									$cpuPrices = mysqli_query($link," SELECT * FROM `motherboard` WHERE '".$myarr[$i]['motherName']."' = `name`; ");
									$myarr1=array();
									while($row = mysqli_fetch_array($cpuPrices)){
										array_push($myarr1, $row);
									}
									$row_number1=count($myarr1);
									for($k=0;$k<$row_number1;$k++){
										$price = "".$myarr1[$k]['price']."";
										$totalprice = $totalprice + (double)$price;
									}
								}
							?>
							<?php
								$monitors = mysqli_query($link," SELECT * FROM cartpccase WHERE '$username' = `username`; ");
								$myarr=array();
								while($row = mysqli_fetch_array($monitors)){
									array_push($myarr, $row);
								}
								$row_number=count($myarr);

								for($i=0;$i<$row_number;$i++){
									$monitorPrices = mysqli_query($link," SELECT * FROM `pccase` WHERE '".$myarr[$i]['pccaseName']."' = `caseName`; ");
									$myarr1=array();
									while($row = mysqli_fetch_array($monitorPrices)){
										array_push($myarr1, $row);
									}
									$row_number1=count($myarr1);
									for($k=0;$k<$row_number1;$k++){
										$price = "".$myarr1[$k]['casePrice']."";
										$totalprice = $totalprice + (double)$price;
									}
								}

							?>
							<?php
								$monitors = mysqli_query($link," SELECT * FROM cartpsu WHERE '$username' = `username`; ");
								$myarr=array();
								while($row = mysqli_fetch_array($monitors)){
									array_push($myarr, $row);
								}
								$row_number=count($myarr);

								for($i=0;$i<$row_number;$i++){
									$monitorPrices = mysqli_query($link," SELECT * FROM `powersupply` WHERE '".$myarr[$i]['name']."' = `name`; ");
									$myarr1=array();
									while($row = mysqli_fetch_array($monitorPrices)){
										array_push($myarr1, $row);
									}
									$row_number1=count($myarr1);
									for($k=0;$k<$row_number1;$k++){
										$price = "".$myarr1[$k]['Price']."";
										$totalprice = $totalprice + (double)$price;
									}
								}

							?>
							<?php
								$cpus = mysqli_query($link," SELECT * FROM cartram WHERE '$username' = `username`; ");
								$myarr=array();
								while($row = mysqli_fetch_array($cpus)){
									array_push($myarr, $row);
								}
								$row_number=count($myarr);

								for($i=0;$i<$row_number;$i++){
									$cpuPrices = mysqli_query($link," SELECT * FROM `ram` WHERE '".$myarr[$i]['RAMname']."' = `name`; ");
									$myarr1=array();
									while($row = mysqli_fetch_array($cpuPrices)){
										array_push($myarr1, $row);
									}
									$row_number1=count($myarr1);
									for($k=0;$k<$row_number1;$k++){
										$price = "".$myarr1[$k]['price']."";
										$totalprice = $totalprice + (double)$price;
									}
								}
							?>
							<?php
								$monitors = mysqli_query($link," SELECT * FROM cartstorage WHERE '$username' = `username`; ");
								$myarr=array();
								while($row = mysqli_fetch_array($monitors)){
									array_push($myarr, $row);
								}
								$row_number=count($myarr);

								for($i=0;$i<$row_number;$i++){
									$monitorPrices = mysqli_query($link," SELECT * FROM `storage` WHERE '".$myarr[$i]['storageName']."' = `Name`; ");
									$myarr1=array();
									while($row = mysqli_fetch_array($monitorPrices)){
										array_push($myarr1, $row);
									}
									$row_number1=count($myarr1);
									for($k=0;$k<$row_number1;$k++){
										$price = "".$myarr1[$k]['Price']."";
										$totalprice = $totalprice + (double)$price;
									}
								}

							?>
							<?php
								$monitors = mysqli_query($link," SELECT * FROM cartthermal WHERE '$username' = `username`; ");
								$myarr=array();
								while($row = mysqli_fetch_array($monitors)){
									array_push($myarr, $row);
								}
								$row_number=count($myarr);

								for($i=0;$i<$row_number;$i++){
									$monitorPrices = mysqli_query($link," SELECT * FROM `thermalcompound` WHERE '".$myarr[$i]['thermalName']."' = `Name`; ");
									$myarr1=array();
									while($row = mysqli_fetch_array($monitorPrices)){
										array_push($myarr1, $row);
									}
									$row_number1=count($myarr1);
									for($k=0;$k<$row_number1;$k++){
										$price = "".$myarr1[$k]['Price']."";
										$totalprice = $totalprice + (double)$price;
									}
								}

							?>
							<?php
								$gpus = mysqli_query($link," SELECT * FROM cartvideo WHERE '$username' = `username`; ");
								$myarr=array();
								while($row = mysqli_fetch_array($gpus)){
									array_push($myarr, $row);
								}
								$row_number=count($myarr);

								for($i=0;$i<$row_number;$i++){
									$cpuPrices = mysqli_query($link," SELECT * FROM `videocards` WHERE '".$myarr[$i]['videocard']."' = CONCAT(manufacturer,' ',chipset); ");
									$myarr1=array();
									while($row = mysqli_fetch_array($cpuPrices)){
										array_push($myarr1, $row);
									}
									$row_number1=count($myarr1);
									for($k=0;$k<$row_number1;$k++){
										$price = "".$myarr1[$k]['price']."";
										$totalprice = $totalprice + (double)$price;
									}
								}
							echo "<tr>";
								echo "<td> $totalprice</td>";
							echo "</tr>";
							?>
						</tbody>
				</table>
			</div>
			</div>

		</body>
		</html>
