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
        h3, #links{
            margin: 15px;
            font-size: 20px;
        }

        h3{
            color: red;
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

    <?php
        $error1 = false;
        $error2 = false;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $pass = $_POST['password'];

            if (empty($username)){
                $error1 = true;
            }

            if (empty($pass)){
                $error2 = true;
            }
        
        
        if (!$error1 && !$error2) {
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
                
            $sql2 = "SELECT * FROM customers WHERE username = '$username' AND password = '$pass';";

            $result2 = $connection->query($sql2);                
            
            if ($result2) {
                $row1 = $result2->fetch_assoc();
                if ($row1 == NULL) {
            ?>
            <h3>
                Login Failed!
            </h3>
            <a href='../html/subscribe.html' id="links">Click here to register</a>
            <br>
            <a href='../php/login.php' id="links">Click here to login</a>

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
            
            <?php
                    exit;
                }
                    else{
                        header("Location: ../php/products.php?cusId=".$row1['cusId']);
                        exit;
                    }
                }
                $connection->close();  
            }
        }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="username">Username: </label>
        <input type="text" name="username" id="username" value="<?php
            if (($_SERVER["REQUEST_METHOD"] == "POST")) {
                echo htmlspecialchars($username);
            }
        ?>">
        <?php
            if ($error1 == true) {
                print("<span style='color: red;'>You must provide a username</span>");
            }      
        ?>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <?php
            if ($error2 == true) {
                print("<span style='color: red;'>You must provide a password</span>");
            }      
        ?>
        <br><br>
        <input type="submit" name="" value="Login">
        <input type="reset" value="Cancel">
    </form>

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