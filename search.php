<?php include"ProInfo.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Shop</title>
    <meta charset="UTF-8">
    <meta name="viewport" content=" width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/shop.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/pagination.js"></script>
	
	  <link rel="stylesheet"
	href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
   
  
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Rufina:wght@700&display=swap" rel="stylesheet">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&family=Rufina:wght@700&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<!--header-->
    <header>
        <div class="logo">
            <img src="img/logo.png" alt="Website Logo" width="100">
        </div>
		
        <ul class="nav">
            <li><a href="home.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="cart_login_required.php">Cart</a></li>
            <li><a href="contact.php">Contact</a></li>
		</ul>
		
        <div class="box">
                <?php
				session_start();
				if (isset($_SESSION['valid_user'])) {
					// Show "Username" and "Log Out"
					echo "Welcome, " . $_SESSION['valid_user'] . " | <a href='logout.php'>Log Out</a>";
				} else {
					// Show "Log In" 
					echo "<a href='account.php'>Log In</a>";
				}
				?>
            </div> 
    </header>
	
	<!--categories-->
	<div class="container">
	
		
	
	<!-- Search Results Section -->
		<div class="search-results">
			<?php
			// Establish a database connection (replace with your database credentials)
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "AromaNook";

		$your_db_connection = new mysqli($servername, $username, $password, $dbname);

			if ($your_db_connection->connect_error) {
			die("Connection failed: " . $your_db_connection->connect_error);
			}

			if (isset($_GET['search'])) {
			$search = $_GET['search'];

			// Query the database to search for products
			$sql = "SELECT * FROM products WHERE product_name LIKE '%$search%'";
			$result = $your_db_connection->query($sql);

    if ($result !== false && $result->num_rows > 0) {
        // Display search results
        echo "<h2>Search Results:</h2>";
        while ($row = $result->fetch_assoc()) {
            echo "<a href='Product{$row['product_id']}.php' class='product'>";
            echo "<img src='{$row['product_pic']}'>";
            echo "<div class='pdt-name'>{$row['product_name']}</div>";
            echo "<div class='pdt-price'>$ {$row['product_price']}</div><br><br>";
            echo "<p>Stock: {$row['product_avaliable']}</p>";
            echo "</a>";
        }
    } else {
        echo "No products found for your search.";
    }
} else {
    echo "Please enter a search term.";
}

// Close the database connection
$your_db_connection->close();
?>

		</div>
	</div>
	
	<!--footer-->
	<div class="footer">
    <div class="footer-content">
      <div class="logo-section">
	  <div class="logo">
           <img src="img/logo.png" alt="Website Logo" width="100">
        <p class="main-text">Aroma Nook</p>
      </div>
      <div class="spacer3"></div>
	  <div class="quick-links">
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="shop.php">Shop</a></li>
          <li><a href="cart.php">Cart</a></li>
          <li><a href="register.php">Register</a></li>
        </ul>
      </div>
	  <div class="spacer3"></div>
      <div class="contact-info">
        <p>Email: <a href="mailto:e200223@e.ntu.edu.sg">e200223@e.ntu.edu.sg</a></p>
		<p> <a href="mailto:tke001@e.ntu.edu.sg">tke001@e.ntu.edu.sg</a></p>
         <div class="spacer3"></div>
		<p>Address: 50 Nanyang Walk, Singapore 639798</p>
      </div>
    </div>
	<div class="spacer3"></div>
	<p class="copyright">&copy; 2023 Aroma Nook. All rights reserved.</p>
  </div>



</body>
</html>