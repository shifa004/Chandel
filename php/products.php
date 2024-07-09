<!--Shifa Mhaskar - 60099580-->

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<title>Chandel</title>

	<!-- Font -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@600&display=swap" rel="stylesheet">

	<!-- CSS -->
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="stylesheet" type="text/css" href="../css/print.css" media="print">

	<!-- Icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="shortcut icon" href="../images/fav-icon.png">

	<!-- Java script -->
	<script defer src="../js/main.js"></script>
	<style>
		table {
			margin: 20px auto;			  
			width: 80%;
			border-collapse: collapse;
			text-align: center;
		}

		th, td {
			border: 1px solid #ddd;
  			padding: 8px;
			color: #222
		}

        th {
  			padding-top: 12px;
  			padding-bottom: 12px;
  			background-color: dimgray;
  			color: gainsboro;
		}
		
		tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		tr:hover {
			background-color: #ddd;
		}

		#center {
    		padding: 10px 16px;
    		margin: 8px 10px;
    		border-radius: 4px;
    		text-align: center;
    		font-size: 16px;
    		cursor: pointer;
   			width: 50%;
		}

		form{
			background: none;
    		padding: 0;
    		max-width: 100%;
    		margin: 0;
    		box-shadow: none;
		}
		@media screen and (min-width: 280px) and (max-width: 750px) {
			#center {
				font-size: 5px;
				width: auto;
			}
		}
	</style>
</head>

<body>
	<header>
		<h1>
			<img src="../images/logo-header.jpg" alt="Header Image">
		</h1>
		<nav class="navbar">
			<a href="../html/index.html">Home</a>
			<?php
				$cusId = isset($_GET['cusId']) ? $_GET['cusId'] : "visitor";
				echo "<a href='products.php?cusId=".$cusId."'>Products</a>";
				echo "<a href='orders.php?cusId=".$cusId."'>Orders</a>";
			?>
			<a href="../html/subscribe.html">Subscribe</a>
			<a href="login.php">Log In</a>
		</nav>
	</header>

	<?php
		$server = "localhost";
		$user = "60099580";
		$password = "3013560";
		$database = "db60099580";

		$connection = new mysqli($server, $user, $password, $database);

		if($connection->connect_errno) {
			echo "<p>Connection to the database failed</p>";
			echo "<p>Error number: " . $connection->connect_errno . "</p>";
			echo "<p>Error message: " . $connection->connect_error . "</p>";
			exit;
		}

		$sql3 = "SELECT * FROM products";

		$result3 = $connection->query($sql3); 
		

		if ($result3){
			print("<table><tr><th>Item Name</th><th>Price</th><th></th></tr>");
			while ($row3 = $result3->fetch_assoc()){
				print ("<tr>");
				print ("<td>". $row3["itemName"]. "</td>");
				print ("<td>QAR " .$row3["price"]. "</td>");
				print("<td><form action='details.php' method='POST'>");
				print("<input type='hidden' name='modelNumber' value='".$row3['modelNumber']."'>");
				print("<input type='hidden' name='cusId' value='".$cusId."'>");
				print ("<input type='submit' id='center' value='Details'></form></td>");
				print ("</tr>");
			}			
		}
		print("</table>");		
		$connection->close();  
	
	?>	
	

	<footer>
		<div class="image-footer">
			<img src="../images/logo-footer.jpg">
		</div>

		<div class="contact">
			<i class="fa fa-phone icons"></i>
			<span>
				<p class="title">Talk to us<br><a href="tel: +974 12345678">+974 12345678</a></p>
			</span>
		</div>

		<div class="contact">
			<i class="fa fa-envelope icons"></i>
			<span>
				<p class="title">Write to us<br><a href="mailto: chandel@gmail.com" class="email">chandel@gmail.com</a>
				</p>
			</span>
		</div>

		<div class="contact">
			<i class="fa fa-question icons"></i>
			<span>
				<p class="title">Visit us<br>Al Muntazah, Doha, Qatar</p>
			</span>
		</div>

		<span class="copyright">
			<p>&copy; Copyright 2020 - Chandel</p>
		</span>
	</footer>
</body>

</html>