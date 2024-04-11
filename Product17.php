<?php include"ProInfo.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Shop</title>
    <meta charset="UTF-8">
    <meta name="viewport" content=" width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/shop.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/MaxRemain.js"></script>
	
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
			<nav class="cat-nav">
			<div class="spacer3"></div>
			
		<form  action="search.php" method="GET">
		<input style=" background: white; border-radius:5px;" type="text" placeholder="Search.." name="search">
		<button style=" background: #f582ae;border-radius:5px;" type="submit"><i class="fa fa-search"></i></button>
		</form>
			<div class="spacer3"></div>
			<h1 style="text-decoration: underline"> Categories</h1>
			<div class="spacer3"></div>
			<ul>
				<li><a href="shop.php">All</a></li>
				<li><a href="Floral.php">Floral & Fruity</a></li>
				<li><a href="Woody.php">Woody & Green</a></li>
				<li><a href="Others.php">Others</a></li>
			</ul>
			</nav>
	
	﻿
	<!--single product details-->
		
		<div class="right-box">
			<div class="row">
				<div class="col-2">
					<img src="img/products/p9.jpg" width="100%">
				</div>
				
				<div class="product-details">
					<div class="subtitle-text"> <?php GetProName(17)?> </div>
					<div class="spacer3"></div>
					<h4> (Men) </h4>
					<div class="spacer3"></div>
			<form action="AddtoCart.php" method="get">
			<table >
				<tr>
					<td>
						<span class="subtitle-text">Size</span><br>
						<label>
							<input type="radio" id="P7C1" value="16" name="Radio" checked="checked" onclick="MaxAva9(<?php echo GetStock(17)?>, <?php GetPrice(17)?>)">
							<?php GetSize(17)?> $<?php GetPrice(17)?>
						</label>
						<p style="font-family: poppins;padding-bottom:5px;">stock: <?php echo GetStock(17)?></p>
						<label>
							<input type="radio" id="P7C2" value="17" name="Radio" onclick="MaxAva9(<?php echo GetStock(18)?>, <?php GetPrice(18)?>)">
							<?php GetSize(18)?> $<?php GetPrice(18)?>
						</label>
						<p style="font-family: poppins;padding-bottom:10px;">stock: <?php echo GetStock(18)?></p>
					</td>
				</tr>
				<tr>
					<td>
						<span class="subtitle-text">Quantity</span><br>
							<input type="number" id="P9Qty" name="P9Qty" value="1" min="1" max="<?php echo GetStock(17)?>" style="width: 50px; height: 35px; font-family: poppins; font-size: 110%; text-align: center; color: #001858; border-radius: 10px; border: none;">
					</td>
				</tr>
				<tr>
					<td>
						<br><input class="button" type="submit" value="Add to Cart">
					</td>
				</tr>
			</table>
			</form>
				</div>
					
					<div class="spacer"></div>
					<div class="subtitle-text"> Product Details</div>
					<div class="main-text"> BLEU DE CHANEL Eau de Toilette is an aromatic-woody fragrance in which New Caledonian sandalwood meets the dry whisper of cedar and the vivacity of citrus. 
					Fresh and energetic, it leaves a vibrant and invigorating trail.The eau de toilette is sprayed directly on the skin or inside clothing for a light and airy perfuming experience.</div>

				
			</div>
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
            <li><a href="cart_login_required.php">Cart</a></li>
            <li><a href="contact.php">Contact</a></li>
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
