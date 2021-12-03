<!DOCTYPE html>
<html>
	<head>
		<title>Blog - James Yakicic's Portfolio Site</title>
		<link rel="stylesheet" href="./styles/media.css">
		<link rel="stylesheet" href="./styles/transition.css">
		<link rel="stylesheet" href="./styles/forms.css">
				<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet">
		<link rel="shortcut icon" href="../icons/favicon1.png">
		<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	</head>
	<body>
		<nav class="navbar">
			<ul class="navbar-nav">
				<li class="logo">
					<a href="#" class="nav-link">
						<span class="link-text">Navigation</span>
						<i class="fas fa-angle-double-right"></i>
					</a>
				</li>
				<li class="nav-item">
					<a href="index.html" class="nav-link">
						<i class="fas fa-home"></i>
						<span class="link-text">Home</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="webdev.html" class="nav-link">
						<i class="fas fa-code"></i>
						<span class="link-text">Web Dev / Design</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="gamedev.html" class="nav-link">
						<i class="fas fa-gamepad"></i>
						<span class="link-text">Pixel Art / Gamedev</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="genart.html" class="nav-link">
						<i class="fas fa-palette"></i>
						<span class="link-text">General Art / Animation</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="aboutme.html" class="nav-link">
						<i class="fas fa-address-card"></i>
						<span class="link-text">About Me / Contact</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="blog.html" class="nav-link">
						<i class="fas fa-comments"></i>
						<span class="link-text">Blog / Commission Info</span>
					</a>
				</li>
			</ul>
		</nav>
		<main>
			<h1>Commission Ticket Recieved!</h1>
			<h3>Thank you. </h3>

			<div class="webcontainer">
				<div class="blogcontainer">
					<h1>Your Commission Ticket Info</h1>
					<p>Thank you for submitting a commission ticket! Don't panic if I do not respond back post haste. I will respond to your inquiry as soon I am able to.</p>

					<!-- I'm sorry my background doesn't really include PHP or SQL, I'm more of a front-end, UI/UX kinda guy. -->
					<?php
					@$dbConnect = new mysqli('localhost', 'root', '', 'tickets');
					if (mysqli_connect_errno()) {
						echo ("<p>Error: Unable to connect to database.</p>" .
								"<p>Error code $dbConnect->connect_errno: $dbConnect->connect_error. </p>");
						exit;
					}

					// get data from the input boxes
					$email = $_POST['email'];
					$company = $_POST['company'];
					$contact = $_POST['contact'];
					$phone = $_POST['phone'];
					$comm_desc = $_POST['comm_desc'];

					if (!$email || !$company || !$contact || !$phone || !$comm_desc) {
					    echo "<p>You have not entered all the required information. </p>";
					    exit;
					}

					// add slashes if add and strip slashes default is not turned on
					// magic_quotes_gpc is off by default in XAMPP, add \ if value contains a quote
					/*if (!get_magic_quotes_gpc()){
						$firstname = addslashes($firstname);
						$lastname = addslashes($lastname);
						$email = addslashes($email);
						$phone = addslashes($phone);
						$password = addslashes($password);
					}*/

					// insert into contact database
					$sqlString = "INSERT into tbl_commtickets values " .
						"(0, '$email', '$company', '$contact', '$phone', '$comm_desc')";
					$result = $dbConnect->query($sqlString);
					if (!$result){
						echo ("<p>Error: Registration information was not added.</p>" .
								"<p>Error code $dbConnect->errno: $dbConnect->error. </p>");
						$dbConnect->close();
						exit;
						}

					$dbConnect->close();
					//** end of input processing
					?>

					<!-- if this actually displayed the inputted information properly, I would uncomment it.
					 <table>
						<tr>
							<td>Ticket Id:</td><br>
							<td>Email Address:</td><br>
							<td>Company Name:</td><br>
							<td>Contact Medium:</td><br>
							<td>Phone Number:</td><br>
							<td>Commission Description:</td><br>
						</tr>
					-->
					<?php
					@$dbConnect = new mysqli('localhost', 'root', '', 'tickets');
					if (mysqli_connect_errno()) {
						echo ("<p>Error: Unable to connect to database.</p>" .
								"<p>Error code $dbConnect->connect_errno: $dbConnect->connect_error. </p>");
						exit;
						}
					$data = mysqli_query(@$dbConnect, "SELECT * FROM tbl_commtickets where email = '$email' && company = '$company' && contact = '$contact' && phone = '$phone' && comm_desc = 'comm_desc'")
					 or die("Unable to select data");
					 #$info = mysqli_fetch_array($data);

					 while($info = mysqli_fetch_array( $data ))
					 {
					 echo "<tr>";
					 echo "<td>" .$info['userid']. "</td>";
					 echo "<td>" .$info['email']. " </td>";
					 echo "<td>" .$info['company']. " </td>";
					 echo "<td>" .$info['contact']. " </td>";
					 echo "<td>" .$info['phone']. " </td>";
					 echo "<td>" .$info['comm_desc']. " </td>";
					 echo "</tr>";
					 }


					//include'eventregistration.html'
					?>
				</div>
			</div>
			<br />
			<!-- acts as a pseudo-footer -->
			<div class="transition"></div>

		</main>
		<!-- footer should not show on mobile mode.
		<footer>
			<div>
				<span class="footer">James Yakicic © 2021</span>
			</div>
		</footer>
		-->
	</body>
</html>
