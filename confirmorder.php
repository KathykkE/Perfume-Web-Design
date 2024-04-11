<!DOCTYPE html>
<html lang="en">
<head>
	<title>Aroma Nook</title>
    <meta charset="UTF-8">
    <meta name="viewport" content=" width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	
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
	<div class="spacer"></div>
	 <div id="divide">
        </div>
    <div class="login-container">
    <p class="subtitle-text">Confirm order</p>
    <form class="login-form" action="confirmorder_doc.php" method="post">
        <table>
            <tr>
                <td>
                    Recipient's name:<br>
                    <input type="text" name="name" id="name" required><br><br>
                </td>
            </tr>
            <tr>
                <td>
                    Address:<br>
                    <input type="text" name="address" id="address" required><br><br>
                </td>
            </tr>
            <tr>
                <td>
                    Postcode:<br>
                    <input type="text" name="postcode" id="postcode" required><br><br>
                </td>
            </tr>
            <tr>
                <td>
                    Contact number:<br>
                    <input type="text" name="contact" id="contact" required><br><br>
                </td>
            </tr>
        </table>
        <input class='button' type='hidden' name='username2' value='<?php 
        $username = $_SESSION['valid_user'];
        echo $username; ?>'>
        <input class='button' style='font-weight: 500; padding: 12px 22px; font-size:16px;' type='submit' value='Confirm Order'>
    </form>

    <script type = "text/javascript"  src = "js/check_confirmorder.js" ></script>
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