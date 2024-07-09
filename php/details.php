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
		section, section h1{
			margin: 15px;
		}

		section h3 {
			color: rgb(61, 61, 61);
		}

		section p {
			margin: 10px 0px;
			font-size: 19px;
			color: rgb(61, 61, 61);
		}

		section img {
			display: block;
  			margin-left: auto;
			margin-right: auto;
			width: 30%;
			margin-bottom: 15px;
		}

		section figcaption {
			width: 98%;
			margin: 10px;
			font-style: normal;
			font-size: 20px;
    		color: rgb(61, 61, 61);
		}

		input[type=number]{
			color: rgb(61, 61, 61);
			width: 6%;
			padding: 10px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1.5px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			font-size: 15px;
		}

		form{
			background: none;
    		padding: 0;
    		max-width: 100%;
    		margin: 0;
    		box-shadow: none;
		}

		input[type=submit]{
			color: gainsboro;
			background-color: dimgray;
			padding: 5px;
			margin: 8px 10px;
			border-radius: 4px;
			text-align: center;
			font-size: 16px;
			cursor: pointer;
			width: 5%;
		}

		@media screen and (orientation: portrait) and (min-width: 300px){
			section img {
				width: 80%;
			}

			input[type=number]{
			width: 15%;
			}

			input[type=submit] {
				padding: 5px;
				width: 18%;
			}
		}

		@media screen and (orientation: landscape) and (min-width: 500px) and (max-width: 750px) {
			section img {
				width: 50%;
			}

			input[type=number] {
			width: 10%;
			}

			input[type=submit] {
				padding: 5px;
				width: 12%;
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
			<a href="products.php">Products</a>
			<a href="orders.php">Orders</a>
			<a href="../html/subscribe.html">Subscribe</a>
			<a href="login.php">Log In</a>
		</nav>
	</header>
	
	<section>
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

        $modelNo = $_POST['modelNumber'];
		$cusId = isset($_POST['cusId']) ? $_POST['cusId'] : 'visitor';
        $sql4 = "SELECT * FROM products WHERE modelNumber = $modelNo";
        $result4 = $connection->query($sql4);

		if ($result4){
			while ($row4 = $result4->fetch_assoc()){
				print("<h1>" .$row4['itemName']. "</h1>");
				print("<figure>");
                print("<img src='" . $row4['itemImage'] . "' alt='Product Image".$modelNo."' class='prod'/>");
				print("<figcaption>Price: " .$row4["price"]. " QR</figcaption>");
				print("</figure>");
				print("<form action='purchase.php?cusId=".$cusId."' method='POST'>");
				print("<label style='font-size: 19px;'>Quantity Needed: ");
				print("<input type='number' name='quantity'>");
				print("</label>");
				print("<input type='hidden' name='modelNumber' value='".$row4['modelNumber']."'>");
				print("<input type='submit' value='Buy'>");
				print("</form>");
				print ("<h3>Description: </h3><p>". $row4["itemDescription"]. "</p>");
				if ($row4['availability'] > 0) {
                	print ("<h3> Quantity Available: </h3><p>". $row4['availability']."</p>");
				}
				else {
					print ("<h3> Quantity Available: </h3><p>Out of Stock. Coming Soon!</p>");
				}
                print ("<h3> Colors Available: </h3><p>".$row4["colorsAvailable"] . "</p>");

			}			
		}
		print("</table>");		
		$connection->close();
    ?>
	</section>
	
        

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