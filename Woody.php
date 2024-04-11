<?php include"ProInfo.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Woody & Green </title>
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
			
			<a href="Product17.php" class="product">
				<img src="img/products/p9.jpg">
				<div class="pdt-name"> <?php GetProName(17)?></div>
				<div class="pdt-price"> $ <?php GetPrice(17)?> </div><br><br>
				<p>(<?php GetSize(17)?>):<?php echo GetStock(17)?></p> 
					
				<p>(<?php GetSize(18)?>): <?php echo GetStock(18)?></p> 
			</a>
			
			<a href="Product7.php" class="product">
				<img src="img/products/p4.jpg">
				<div class="pdt-name"> <?php GetProName(7)?></div>
				<div class="pdt-price"> $ <?php GetPrice(7)?></div><br><br>
				<p>Stock (<?php GetSize(7)?>): <?php echo GetStock(7)?></p> 
					
				<p>Stock (<?php GetSize(8)?>): <?php echo GetStock(8)?></p> 
			</a>
			
				
			<a href="Product11.php" class="product">
				<img src="img/products/p6.png">
				<div class="pdt-name"> <?php GetProName(11)?> </div>
				<div class="pdt-price"> $ <?php GetPrice(11)?> </div><br><br>
				<p>Stock (<?php GetSize(11)?>):<?php echo GetStock(11)?></p> 
					
				<p>Stock(<?php GetSize(12)?>): <?php echo GetStock(12)?></p> 
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