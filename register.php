<?php
@ $db = mysqli_connect("localhost", "root", "", "AromaNook");

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $email = $_POST['email'];
    // Check if the email already exists in the database
    $checkEmailQuery = "SELECT * FROM customer WHERE customer_email = '$email'";
    $result = mysqli_query($db, $checkEmailQuery);

    // Check if the username already exists in the database
    $checkUsernameQuery = "SELECT * FROM customer WHERE customer_name = '$username'";
    $resultUsername = mysqli_query($db, $checkUsernameQuery);

    if (mysqli_num_rows($result) > 0) {
            echo '<script>
                alert("Email is already registered. Please log in.");
                window.location.href = "account.php";
                </script>';
    } else {
         if (mysqli_num_rows($resultUsername) > 0) {
        echo '<script>
            alert("Username is already registered. Please log in or choose another username.");
            window.location.href = "account.php";
            </script>';
          } else {



    $password = md5($password);

    @ $db = mysqli_connect("localhost", "root", "", "AromaNook");
    $sql = "INSERT INTO customer (customer_name, password, customer_email)
            VALUES ('$username', '$password', '$email')";
    $result = $db->query($sql);

    if (!$result) {
        echo "Your query failed.";
    } else {
        echo "<script>alert('Congratulations. You have registered successfully!');parent.location.href='account.php';</script>";
    }
}}}
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
    <p class="subtitle-text">Create Account</p>
    <form class="login-form" action="Register.php" method="post" onsubmit="return validateForm()">
    <input type="hidden" name="submitted_username" value="<?php echo isset($_POST['submitted_username']) ? htmlspecialchars($_POST['submitted_username']) : ''; ?>">
	<table><tr><td>
    Username:<br>
    <input type="text" name="username" id="username" placeholder="4 ~ 10 characters" required><br ><br >
    </td></tr><tr><td>
    Password:<br>
    <input type="password" name="password" id="password" placeholder="8 ~ 12 characters" required><br ><br>
    </td></tr><tr><td>
    Confirm password:<br>
    <input type="password" name="password2" id="password2" required><br><br>
    </td></tr><tr><td>
    Email:<br>
    <input type="email" name="email" id="email" placeholder="xx@xx.xx" required><br><br >
    </td></tr></table>
    <input class="button" type="submit" name="submit" value="Submit">
    <input class="button" type="reset" name="reset" value="Reset">
    </form>
    <script type = "text/javascript"  src = "js/check.js" ></script>
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