<!DOCTYPE html>
<html lang="en">
<head>
	<title>Aroma Nook</title>
    <meta charset="UTF-8">
    <meta name="viewport" content=" width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	  <link rel="stylesheet"
	href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
   
  
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Rufina:wght@700&display=swap" rel="stylesheet">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&family=Rufina:wght@700&display=swap" rel="stylesheet">

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
	
	<!--home-->
	<div class="text-container">
		<div class="Ad-text1">Your Signature <br> Scent, Your <br> Identity</div>
		<div class="Ad-text2">Let Your Scent Tell Your Story</div>
		<a href="shop.php" class="button">Explore Now </a>
		<div class="spacer"></div>
		<div class="spacer"></div>
	</div>
		
	<div class="img-container">
		<div class="hpAd-frame">
				<img src="img/hp_Ad.png" alt="HP Ad">
		</div>
	</div>


	
	<!--About Us-->
    <div class="about-us">
	<div class="spacer2"></div>
        <div class="subtitle-text">About Us</div>
		<div class="spacer3"></div>
        <p class="main-text" style="text-align:left">
            At Aroma Nook, we believe that fragrance is an art form, a journey, and a means of self-expression. 
			Our online boutique is your passport to a world of captivating scents, where you can explore an extensive collection of perfumes and fragrances carefully curated to cater to every taste and occasion.
			<br> We understand that selecting the perfect fragrance is a deeply personal experience, and that's why we've made it our mission to provide you with a diverse and luxurious selection of scents that range from timeless classics to modern masterpieces. 
        </p>
	<div class="spacer2"></div>
    </div>
	
	
	<!--Categories-->
	<div class="categories">
		<div class="spacer2"></div>
		<div class="title-text"> Categories</div>
		<div class="spacer3"></div>
			<p class="main-text">
				Find the perfumes based on their primary scent notes and characteristics.
			</p>
		<div class="spacer3"></div>
		<div class="cat-grid">
			<a href="floral.php" class="cat-box">
				<img src="img/flower.png" alt="flower">
				<div class="subtitle-text"> Floral & Fruity </div>
			</a>
		
			<a href="woody.php" class="cat-box">
				<img src="img/wood.png" alt="wood">
				<div class="subtitle-text"> Woody & Green </div>
			</a>
		
			<a href="others.php" class="cat-box">
				<img src="img/spice.png" alt="others">
				<div class="subtitle-text"> Others </div>
			</a>
		
		</div>
		
		<div class="spacer2"></div>
			<div style="padding-left:46%">
			<a href="shop.php" class="button"> See All → </a>
			</div>
		<div class="spacer"></div>
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
