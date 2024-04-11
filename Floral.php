<?php include"ProInfo.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Floral & Fruity</title>
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
                <a href="login.php">Log In</a>
            </div> 
    </header>
	
	<!--product page-->
	
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
		<div class="right-box">
			<div class="pdt-grid">
			<a href="Product1.php" class="product">
				<img src="img/products/p1.png">
				<div class="pdt-name"> <?php GetProName(1)?> </div>
				<div class="pdt-price">$ <?php GetPrice(1)?> </div><br><br>
				<p>Stock (<?php GetSize(1)?>): <?php echo GetStock(1)?></p> 
					
				<p>Stock (<?php GetSize(2)?>): <?php echo GetStock(2)?></p> 
					
			</a>
		
			<a href="Product9.php" class="product">
				<img src="img/products/p5.png">
				<div class="pdt-name"> <?php GetProName(9)?> </div>
				<div class="pdt-price"> $ <?php GetPrice(9)?> </div><br><br>
				<p>Stock (<?php GetSize(9)?>): <?php echo GetStock(9)?></p> 
					
				<p>Stock (<?php GetSize(10)?>): <?php echo GetStock(10)?></p> 
			</a>
		
			<a href="Product13.php" class="product">
				<img src="img/products/p7.png">
				<div class="pdt-name"> <?php GetProName(13)?></div>
				<div class="pdt-price"> $ <?php GetPrice(13)?> </div><br>
				<p>Stock (<?php GetSize(13)?>): <?php echo GetStock(13)?></p> 
					
				<p>Stock (<?php GetSize(14)?>): <?php echo GetStock(14)?></p> 
			</a>
			
			</div>
		</div>
	</div>
	
	<div class="pagination">
    <button class="prev-page">Previous Page</button>
    <button class="next-page">Next Page</button>
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
