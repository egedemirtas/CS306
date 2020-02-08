<html>
  
  <head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	</head>
	
<?php
	error_reporting(E_ALL ^ E_DEPRECATED);

	$link = mysqli_connect("localhost", "root", "", "cs306 project");
	session_start(); // remember the variables that are used. Use this in another page if you want to remember the variables that you get here.
					 $username = $_SESSION['username'];

	// Check connection
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}

	$check = mysqli_query($link,"SELECT * FROM cpu ");

	if (!$check) { // add this check.
		die('Invalid query: ' . mysql_error());
	}

	$myarr=array();

	while($row = mysqli_fetch_array($check))
	{
	array_push($myarr, $row);
	}
?>

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
			<h1 class="h1"> Choose CPU </h1>
				<table class="table table-striped table-hover">
						<thead class="thead-dark">
							<tr class="success">
								<th>Manufacturer</th>
								<th>Series</th>
								<th>Integrated GPU</th>
								<th>Socket</th>
								<th>Core Number</th>
								<th>Speed</th>
								<th>Power</th>
								<th>Price</th>
								<th>Actions</th>
								<?php 
									if($username=='Admin' or $username=='admin'){
										echo "<th colspan='2'>Admin Actions</th>";
									}
								?>
							</tr>
						</thead>
						
						<tbody>
							<?php
							$row_number=count($myarr);

							for($i=0;$i<$row_number;$i++)
							{
								echo "<tr>";
									echo"<td>" .$myarr[ $i]['Manufacturer'].  "</td>";
									echo "<td>" .$myarr[$i]['Series'].  "</td>";
									echo"<td> " .$myarr[ $i]['IntegratedGPU'].  "</td>";
									echo"<td> " .$myarr[ $i]['Socket'].  "</td>";
									echo "<td>". $myarr[$i]['CoreNum'].  "</td>";
									echo"<td> " .$myarr[ $i]['Speed'].  "</td>";
									echo "<td>". $myarr[$i]['Power'].  "</td>";
									echo "<td>". $myarr[$i]['Price'].  "</td>";
									echo "<td><form action='cpu.php' method=POST ><button class=\"btn btn-success\" type='submit' value= '" .$myarr[$i]['Series']. "' name=\"choiceCPU\">Select</button></form></td>";
									if($username=='Admin' or $username=='admin'){
										echo "<td><form action='cpuEdit.php' method=POST ><button class=\"btn btn-primary\" type='submit' value= '" .$myarr[$i]['Series']. "' name=\"editCPU\">Edit</button></form></td>";
										echo "<td><form action='cpu.php' method=POST ><button class=\"btn btn-danger\" type='submit' value= '" .$myarr[$i]['Series']. "' name=\"deleteCPU\">Delete</button></form></td>";
									}
								echo "</tr>";
							}
							if($username=='Admin' or $username=='admin'){
									echo "<tr>";
										echo "<td colspan='9'></td>";
										echo "<td colspan='2'><form action='cpuEdit.php' method=POST ><button class=\"btn btn-warning\" type='submit' value= 'x' name=\"insertCPU\">Insert New CPU</button></form></td>";
									echo "</tr>";
							}
							?>
							
						</tbody>
				</table>
			</div>
		</div>
			
			
	</body>
</html>

