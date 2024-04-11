<?php
include("connection.php");
$result_message ="";

if (isset($_POST["customer_email"])) {
    // get the email to reset password
    $customer_email = $_POST["customer_email"];
    $new_password = $_POST['password'];

    // check if email is registered
    $query = "SELECT * FROM customer WHERE customer_email = '" . $email . "'";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "Query Failed. Check DB connection.";
        mysqli_close($conn);
        exit;
    }

    $row = $result->fetch_assoc();
    if (empty($row)) { // if email not registered
        $result_message = "Email is not registerd. Please check your entered email.";
    } else {
        $hashed_new_password = md5($new_password);
        // update the newly generated password to db
        $reset_query = "UPDATE customer SET password = '" . $hashed_new_password . "' WHERE customer_email = '" . $customer_email . "';";
        if (!mysqli_query($conn, $reset_query)) {
            echo "Reset query Failed. Check DB connection.";
            mysqli_close($conn);
            exit;
        }

        // send email to inform user of the new password
        $to = "f32ee@localhost";
        $subject = "Password has been reset";
        $message = "Please find your new password: " . $new_password;
        $headers = 'From: f32ee@localhost' . "\r\n" . 'Reply-To:f32ee@localhost' . '\r\n' . 'X-Mailer:PHP/' . phpversion();

        mail($to, $subject, $message, $headers, '-ff32ee@localhost');

        //$result_message = "An email has been sent to your email.";
        echo '<script>
        alert("Password reset successful! Now you can log in by email and password.");
        window.location.href = "login.php";
        </script>';
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Aroma Nook</title>
    <meta charset="UTF-8">
    <meta name="viewport" content=" width=device-width, initial-scale=1.0">
    <script src="js/login.js"></script>
    <link rel="stylesheet" href="css/login.css">
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
                <a href="account.php">Log In</a>
            </div> 
    </header>

        <div class="spacer"></div>
            <div class="login-container">
			 <p class="subtitle-text">Reset Password</p>
                <form class="login-form" action="reset_password.php" method="POST" onsubmit="return validateResetPwdForm()">
                   
                    <label for="email" class="form-label">Email: </label>
                    <input type="text" name="email" id="Email" class="form-input">
                    <label for="password" class="form-label">New Password: </label>
                    <input type="password" name="password" id="Password" class="form-input">
                    <br />
                    <label for="password" class="form-label">Confirm Password: </label>
                    <input type="password" name="confirmPassword" id="ConfirmPassword" class="form-input">
                    <br />
                    <input type="submit" class="button" value="Reset Password" id="ResetPwdBtn"></input>
                    <p id="ResetPwdMessage">
                    </p>
                </form>
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
    </div>
</body>

</html>