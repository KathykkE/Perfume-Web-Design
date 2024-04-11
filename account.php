<?php
@ $db = mysqli_connect("localhost", "root", "", "AromaNook");
session_start();

if (isset($_POST['userid']) && isset($_POST['password']))
{
  $userid = $_POST['userid'];
  $password = $_POST['password'];
  $password = md5($password);
  $query = 'select * from customer '
           ."where customer_name='$userid' "
           ." and password='$password'";
  $result = $db->query($query);
  if ($result->num_rows >0 )
  {
    $_SESSION['valid_user'] = $userid;
  }
  $db->close();
}
?>
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
            <li><a href="cart.php">Cart</a></li>
            <li><a href="contact.php">Contact</a></li>
		</ul>
		<div class="box">
			<?php
			
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
       
  <?php
  if (isset($_SESSION['valid_user'])) {
    echo '<p class="loggedin">You are logged in as: ' . $_SESSION['valid_user'] . '</p>';
    echo '<br><a href="shop.php" class="button">Start Shopping</a>';
  } else {
    if (isset($userid)) {
      echo '<p class="error-message">Could not log you in. <br> Please check your username and password again.</p>';
    } else {
      echo '<p class="welcome-message">Welcome to Aroma Nook</p>';
    }

    echo '<form class="login-form" method="post" action="account.php">';
    echo '<table>';
    echo '<tr><td>Username:</td>';
    echo '<td><input type="text" name="userid" value="' . (isset($userid) ? htmlspecialchars($userid) : '') . '"></td></tr>';
    echo '<tr><td>Password:</td>';
    echo '<td><input type="password" name="password" value="' . (isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '') . '"></td></tr>';
    echo '<tr><td colspan="2" align="center">';
    echo '<input class="button" type="submit" value="Log in"></td></tr>';
    echo '</table></form>';
    echo '<p class="new">—— Do not have account? ——</p>';
    echo '<a href="Register.php" class="create">Register Now</a>';

 
  }
  ?>

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

