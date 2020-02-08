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
		
		<div class="container-fluid";>
			<div class="row">
				<div class="col">&nbsp;</div>
			</div>
			<div class="row">
			<div class="col-lg-2"></div>
				<div class="col-lg-4">
				<table class="table table-striped table-hover">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">CPU</th>
					  <th scope="col"></th>
				    </tr>
					
				  </thead>
				  <tbody>
				    <tr>
					  <?php
					  session_start();
					  $username = $_SESSION['username'];
					  
					  $link = mysqli_connect("localhost", "root", "", "cs306 project");
						$keyinCart = mysqli_query($link," SELECT * FROM cartcpu WHERE '$username' = username; ");
						$myarr=array();
						while($row = mysqli_fetch_array($keyinCart)){
							array_push($myarr, $row);
						}
						$row_number=count($myarr);
						for($i=0;$i<$row_number;$i++)
						{
							$manuCPU = mysqli_query($link," SELECT * FROM cpu WHERE '".$myarr[$i]['cpuSeries']."' = Series; ");
							$myarr1=array();
							while($row = mysqli_fetch_array($manuCPU)){
								array_push($myarr1, $row);
							}
							$row_number1=count($myarr1);
							for($j=0;$j<$row_number1;$j++)
							{
								echo "<tr>";
								echo"<td> ".$myarr1[$j]['Manufacturer']." ".$myarr[$i]['cpuSeries']." </td>";
								echo "<td><form action='cpu.php' method=POST ><button class=\"btn btn-danger\" type='submit' value= '" .$myarr[$i]['cpuSeries']. "' name=\"deleteSingleCPU\">Remove</button></form></td>";
								echo "</tr>";
							}
						}
					  ?>
					  <td><a class="btn btn-success" href="selectCPU.php" role="button">Add CPU</a>
					  <td><form action='cpu.php' method=POST ><button class="btn btn-danger" type='submit' value= 'x' name="deleteALL">Remove All</button></form></td>
					  </td>
				    </tr>
				  </tbody>
				</table>
				</div>
				
				<div class="col-lg-4">
				<table class="table table-striped table-hover">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">Motherboard</th>
					  <th scope="col"></th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
					   <?php
					  $username = $_SESSION['username'];
					  
					  $link = mysqli_connect("localhost", "root", "", "cs306 project");
						$keyinCart = mysqli_query($link," SELECT * FROM cartmotherboard WHERE '$username' = username");
						$myarr=array();
						while($row = mysqli_fetch_array($keyinCart)){
							array_push($myarr, $row);
						}
						$row_number=count($myarr);
						for($i=0;$i<$row_number;$i++)
						{
							echo "<tr>";
							echo"<td> ".$myarr[$i]['motherName']." </td>";
							echo "<td><form action='motherboard.php' method=POST ><button class=\"btn btn-danger\" type='submit' value= '" .$myarr[$i]['motherName']. "' name=\"deleteSingleMotherboard\">Remove</button></form></td>";
							echo "</tr>";
						}
					  ?>
					  <td><a class="btn btn-success" href="selectMotherboard.php" role="button">Add Motherboard</a>
					  <td><form action='motherboard.php' method=POST ><button class="btn btn-danger" type='submit' value= 'x' name="deleteALL">Remove All</button></form></td>
					  </td>
				    </tr>
				  </tbody>
				</table>
				</div>
			</div>
			  
			<div class="row">
				<div class="col">&nbsp;</div>
			</div>
			<div class="row">
			<div class="col-lg-2"></div>
				<div class="col-lg-4">
				<table class="table table-striped table-hover">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">RAM</th>
					  <th scope="col"></th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
					  <?php
					  $username = $_SESSION['username'];
					  
					  $link = mysqli_connect("localhost", "root", "", "cs306 project");
						$keyinCart = mysqli_query($link," SELECT * FROM cartram WHERE '$username' = username");
						$myarr=array();
						while($row = mysqli_fetch_array($keyinCart)){
							array_push($myarr, $row);
						}
						$row_number=count($myarr);
						for($i=0;$i<$row_number;$i++)
						{
							echo "<tr>";
							echo"<td> ".$myarr[$i]['RAMname']." </td>";
							echo "<td><form action='ram.php' method=POST ><button class=\"btn btn-danger\" type='submit' value= '" .$myarr[$i]['RAMname']. "' name=\"deleteSingleRAM\">Remove</button></form></td>";
							echo "</tr>";
						}
					  ?>
					  <td><a class="btn btn-success" href="selectRAM.php" role="button">Add RAM</a>
					  <td><form action='ram.php' method=POST ><button class="btn btn-danger" type='submit' value= 'x' name="deleteALL">Remove All</button></form></td>
					  </td>
				    </tr>
				  </tbody>
				</table>
				</div>
				
				<div class="col-lg-4">
				<table class="table table-striped table-hover">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">Video Card</th>
					  <th scope="col"></th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
					  <?php
					  $username = $_SESSION['username'];
					  
					  $link = mysqli_connect("localhost", "root", "", "cs306 project");
						$keyinCart = mysqli_query($link," SELECT * FROM cartvideo WHERE '$username' = username");
						$myarr=array();
						while($row = mysqli_fetch_array($keyinCart)){
							array_push($myarr, $row);
						}
						$row_number=count($myarr);
						for($i=0;$i<$row_number;$i++)
						{
							echo "<tr>";
							echo"<td> ".$myarr[$i]['videocard']." </td>";
							echo "<td><form action='gpu.php' method=POST ><button class=\"btn btn-danger\" type='submit' value= '" .$myarr[$i]['videocard']. "' name=\"deleteSingleGPU\">Remove</button></form></td>";
							echo "</tr>";
						}
					  ?>
					  <td><a class="btn btn-success" href="selectGPU.php" role="button">Add GPU</a>
					  <td><form action='gpu.php' method=POST ><button class="btn btn-danger" type='submit' value= 'x' name="deleteALL">Remove All</button></form></td>
					  </td>
				    </tr>
				  </tbody>
				</table>
				</div>
			</div>
			
			<div class="row">
				<div class="col">&nbsp;</div>
			</div>
			
			<div class="row">
			<div class="col-lg-2"></div>
				<div class="col-lg-4">
				<table class="table table-striped table-hover">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">Storage</th>
					  <th scope="col"></th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
					  <?php
					  $username = $_SESSION['username'];
					  
					  $link = mysqli_connect("localhost", "root", "", "cs306 project");
						$keyinCart = mysqli_query($link," SELECT * FROM cartstorage WHERE '$username' = username");
						$myarr=array();
						while($row = mysqli_fetch_array($keyinCart)){
							array_push($myarr, $row);
						}
						$row_number=count($myarr);
						for($i=0;$i<$row_number;$i++)
						{
							echo "<tr>";
							echo"<td> ".$myarr[$i]['storageName']." </td>";
							echo "<td><form action='storage.php' method=POST ><button class=\"btn btn-danger\" type='submit' value= '" .$myarr[$i]['storageName']. "' name=\"deleteSingleStorage\">Remove</button></form></td>";
							echo "</tr>";
						}
					  ?>
					  <td><a class="btn btn-success" href="selectStorage.php" role="button">Add Storage Unit</a>
					  <td><form action='storage.php' method=POST ><button class="btn btn-danger" type='submit' value= 'x' name="deleteALL">Remove All</button></form></td>
					  </td>
				    </tr>
				  </tbody>
				</table>
				</div>
				
				
				<div class="col-lg-4">
				<table class="table table-striped table-hover">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">PC Case</th>
					  <th scope="col"></th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
					   <?php
					  $username = $_SESSION['username'];
					  
					  $link = mysqli_connect("localhost", "root", "", "cs306 project");
						$keyinCart = mysqli_query($link," SELECT * FROM cartpccase WHERE '$username' = username");
						$myarr=array();
						while($row = mysqli_fetch_array($keyinCart)){
							array_push($myarr, $row);
						}
						$row_number=count($myarr);
						for($i=0;$i<$row_number;$i++)
						{
							echo "<tr>";
							echo"<td> ".$myarr[$i]['pccaseName']." </td>";
							echo "<td><form action='pccase.php' method=POST ><button class=\"btn btn-danger\" type='submit' value= '" .$myarr[$i]['pccaseName']. "' name=\"deleteSinglePCCase\">Remove</button></form></td>";
							echo "</tr>";
						}
					  ?>
					  <td><a class="btn btn-success" href="selectPCCase.php" role="button">Add PC Case</a>
					  <td><form action='pccase.php' method=POST ><button class="btn btn-danger" type='submit' value= 'x' name="deleteALL">Remove All</button></form></td>
					  </td>
				    </tr>
				  </tbody>
				</table>
				</div>
			</div>
			
			<div class="row">
				<div class="col">&nbsp;</div>
			</div>
			<div class="row">
			<div class="col-lg-2"></div>
				<div class="col-lg-4">
				<table class="table table-striped table-hover">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">Monitor</th>
					  <th scope="col"></th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
					  <?php
					  $username = $_SESSION['username'];
					  
					  $link = mysqli_connect("localhost", "root", "", "cs306 project");
						$keyinCart = mysqli_query($link," SELECT * FROM cartMonitor WHERE '$username' = username");
						$myarr=array();
						while($row = mysqli_fetch_array($keyinCart)){
							array_push($myarr, $row);
						}
						$row_number=count($myarr);
						for($i=0;$i<$row_number;$i++)
						{
							echo "<tr>";
							echo"<td> ".$myarr[$i]['monitorName']." </td>";
							echo "<td><form action='monitor.php' method=POST ><button class=\"btn btn-danger\" type='submit' value= '" .$myarr[$i]['monitorName']. "' name=\"deleteSingleMonitor\">Remove</button></form></td>";
							echo "</tr>";
						}
					  ?>
					  <td><a class="btn btn-success" href="selectMonitor.php" role="button">Add Monitor</a>
					  <td><form action='monitor.php' method=POST ><button class="btn btn-danger" type='submit' value= 'x' name="deleteALL">Remove All</button></form></td>
					  </td>
				    </tr>
				  </tbody>
				</table>
				</div>
				
				<div class="col-lg-4">
				<table class="table table-striped table-hover">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">Thermal Compound</th>
					  <th scope="col"></th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
					  <?php
					  $username = $_SESSION['username'];
					  
					  $link = mysqli_connect("localhost", "root", "", "cs306 project");
						$keyinCart = mysqli_query($link," SELECT * FROM cartthermal WHERE '$username' = username");
						$myarr=array();
						while($row = mysqli_fetch_array($keyinCart)){
							array_push($myarr, $row);
						}
						$row_number=count($myarr);
						for($i=0;$i<$row_number;$i++)
						{
							echo "<tr>";
							echo"<td> ".$myarr[$i]['thermalName']." </td>";
							echo "<td><form action='thermal.php' method=POST ><button class=\"btn btn-danger\" type='submit' value= '" .$myarr[$i]['thermalName']. "' name=\"deleteSingleThermal\">Remove</button></form></td>";
							echo "</tr>";
						}
					  ?>
					  <td><a class="btn btn-success" href="selectThermal.php" role="button">Add Thermal Compound</a>
					  <td><form action='thermal.php' method=POST ><button class="btn btn-danger" type='submit' value= 'x' name="deleteALL">Remove All</button></form></td>
					  </td>
				    </tr>
				  </tbody>
				</table>
				</div>
			</div>
		
					
			<div class="row">
				<div class="col">&nbsp;</div>
			</div>
			<div class="row">
			<div class="col-lg-2"></div>
				<div class="col-lg-4">
				<table class="table table-striped table-hover ">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">Power Supply</th>
					  <th scope="col"></th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
					  <?php
					  $username = $_SESSION['username'];
					  
					  $link = mysqli_connect("localhost", "root", "", "cs306 project");
						$keyinCart = mysqli_query($link," SELECT * FROM cartPSU WHERE '$username' = username");
						$myarr=array();
						while($row = mysqli_fetch_array($keyinCart)){
							array_push($myarr, $row);
						}
						$row_number=count($myarr);
						for($i=0;$i<$row_number;$i++)
						{
							echo "<tr>";
							echo"<td> ".$myarr[$i]['name']." </td>";
							echo "<td><form action='psu.php' method=POST ><button class=\"btn btn-danger\" type='submit' value= '" .$myarr[$i]['name']. "' name=\"deleteSinglePSU\">Remove</button></form></td>";
							echo "</tr>";
						}
					  ?>
					  <td>
						<a class="btn btn-success" href="selectPSU.php" role="button">Add Power Supply</a>
						<td><form action='psu.php' method=POST ><button class="btn btn-danger" type='submit' value= 'x' name="deleteALL">Remove All</button></form></td>
					  </td>
				    </tr>
				  </tbody>
				</table>
				</div>
				
				
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-2" ></div>
			<div class="col-lg-8" >
			<form action='results.php' method=POST;>
				<button class="btn btn-primary" type='submit' value= 'x' name="choiceCPU" style="font-size : 30px; width: 100%;">Show Compatibilities &amp Price</button>
				</form>
			</div>
		</div>
	</body>
</html>
