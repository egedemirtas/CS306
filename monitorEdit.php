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
			<div class="col-lg-4">
			<table class="table table-striped table-hover">
				<thead class="thead-dark">
					<tr class="success">
						<th>Attributes</th>
						<th>New Entry</th>
				</thead>
				
				<tbody>
					<tr>
						<form action='monitor.php' method=POST >
							<tr><td>Manufacturer</td><td><input type='text' name='monitorManuf' /></td></tr>
							<tr><td>Name</td><td><input type='text' name='monitorName' /></td></tr>
							<tr><td>Resolution</td><td><input type='text' name='resolution' /></td></tr>
							<tr><td>Size</td><td><input type='text' name='monSize' /></td></tr>
							<tr><td>Response Time</td><td><input type='text' name='responseTime' /></td></tr>
							<tr><td>Refresh Rate</td><td><input type='text' name='refreshRate' /></td></tr>
							<tr><td>Aspect Ratio</td><td><input type='text' name='aspectRatio' /></td></tr>
							<tr><td>Interface</td><td><input type='text' name='monInterface' /></td></tr>
							<tr><td>Price</td><td><input type='text' name='monPrice' /></td></tr>
							<?php
							if(isset($_POST['editMonitor'])){
								$editMonitor = mysql_real_escape_string($_POST['editMonitor']);
								echo "<tr><td colspan=\"8\"><button class=\"btn btn-primary\" type='submit' value= '".$editMonitor."' name=\"editMonitor\">Submit</button></td></tr>";
							}
							if(isset($_POST['insertMonitor'])){
								$insertMonitor = mysql_real_escape_string($_POST['insertMonitor']);
								echo "<tr><td colspan=\"8\"><button class=\"btn btn-primary\" type='submit' value= '".$insertMonitor."' name=\"insertMonitor\">Submit</button></td></tr>";
							}
							?>
							
						</form>
					</tr>
				</tbody>
			
		</table>
		</div>
		</div>
		</body>
</html>