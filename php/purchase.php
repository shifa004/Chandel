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
        #links{
            margin: 30px;
            font-size: 20px;
        }

        section{
            min-height: 100%;
        }

        section p {
			margin: 10px 20px;
			font-size: 21px;
			color: rgb(61, 61, 61);
		}

        section h3 {
			margin: 15px;
			color: rgb(61, 61, 61);
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
        $quantity = $_POST['quantity'];

        if ($cusId == "visitor") {
            echo "<h3>You need to register or login to purchase</h3>";
            echo "<p>Click here to Register:  <a href='../html/subscribe.html'><input type='button' value='Subscribe' id='center'></a></p>";
            echo "<br>";
            echo "<p>Click here to login:  <a href='login.php'><input type='button' value='Login' id='center'></a></p>";
        }

        else {
            $sql5 = "SELECT * FROM products WHERE modelNumber = $modelNo";
            $result5 = $connection->query($sql5);
            $row5 = $result5->fetch_assoc();

            $price = $row5['price'];
            $total = $quantity * $price;
            $date = date("Y-m-d");
            $availability = $row5['availability'] - $quantity;

            

            $sql7 = "INSERT INTO orders (modelNumber, cusId, price, quantity, totalAmount, orderDate) VALUES ('$modelNo', '$cusId', '$price', '$quantity', '$total', '$date')";
            $result7 = $connection->query($sql7);

            if (!$result7) {
                print("<p>Sorry! The purchase failed!</p>");
                print("<p>You have already purchased this product or the product is out of stock.</p>");
                print("<p><a href='products.php?cusId=".$cusId."'>Please try again</a></p>");
            }

            else {
                $sql6 = "UPDATE products SET availability=$availability WHERE modelNumber=$modelNo";
                $result6 = $connection->query($sql6);
                print("<h2>Thank You!</h2>");
                print("<h3>Your purchase was successful!</h3>");      
                print("<p><a href='orders.php?cusId=".$cusId."' id='links'>Click here to view your orders</a></p>");
                print("<p><a href='products.php?cusId=".$cusId."'' id='links'>Click here to view more products</a></p>");
            }
            $connection->close();
        }
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