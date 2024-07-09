<!--Shifa Mhaskar - 60099580-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
</head>
<body>
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

        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $building = $_POST['building'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $phone = $_POST['phone'];
        $method = $_POST['method'];

        $sql1 = "INSERT INTO customers (username, name, password, email, buildingNumber, streetName, city, phone, methodOfcontact) VALUES ('$username', '$fullname', '$password', '$email', '$building', '$street', '$city', '$phone', '$method')";
        
        $result1 = $connection->query($sql1);
        if ($result1) {
            header("Location: login.php");
            exit;           
        }
        else {            
            print("<p>Entry failed. Try again!</p>");
        }
        $connection->close(); 
    ?>
</body>
</html>