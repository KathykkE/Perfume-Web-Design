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
	
	<script type="text/javascript" src="js/check.js"></script>
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
	

    <!-- Contact Form Section -->
     <section class="contact-section">
	 <div class="spacer"></div>
        <div class="subtitle-text">Contact Us</div>
		<div class="spacer3"></div>
        <div class="main-text">If you have any questions or feedback, please feel free to contact us. </div>
		<div class="spacer3"></div>
		

	<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAAAXNSR0IArs4c6QAAASNJREFUWEftl9ENwjAMRK+bwCZsgpgEmASYBDaBTUCH5MqEBidOKhXJ+WlVJ+752XHTAQsbw8L0IARZGQlCHkIHAFsAK2txo/0B4ALgDID375GmjGL2jS+qXX4EwPdOCnrWeus0fwSTEtKCiHGutN0AbFQwRYI4aY56khTp4IsFMQhGcupAi1QohlcOtyAh20Lro3C9grgd6Wjckg5aKRUJ7uqpIS6mmJ3CXENrikou/UU1pHd0Da1SKtp/taBSWjVUmgWJgxwt2mUH5Wol10ddhLSzXG3JnNpW0SzoF610B5V8XboJ0rXFe28D7SqohIA1JwQFIYuAZf+fGrp3OPdYNFI7m+xaHi7+kC/Nja1/rvO0JvT1MY4/V6vAglAQsghY9heTvk0lIZVu/gAAAABJRU5ErkJggg=="/>
	<div class="contact-info">
        <p>Email: <a href="mailto:e200223@e.ntu.edu.sg">e200223@e.ntu.edu.sg</a></p>
		<p> <a href="mailto:tke001@e.ntu.edu.sg">tke001@e.ntu.edu.sg</a></p>
      </div>
	  
	<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAAAXNSR0IArs4c6QAAAfhJREFUWEftl+tNgzEMRW83gUmASYBJgEmASYBJYBPQEbXkz83DTiWoEPnTSk3Sk+sb29npxMbuxHj054BuJF1Iutwr/SHpWdLTqvKrCp1JenQg8f9fJd1KArA0VoFeBjAGANRViUZa8tC9pLvkH6FSKXwrCmXUMV5ggEqPFaDP9O7fHjovzF8K2bskTJ0ZPwJUCVnZ2Cshq5j6QRLz02MFiM0zYSuHi41XgWZQ5VCZhMcAsQclg4xtJgfkV0qH94T3VNkz0VxZhSii1/vFsRzMgLiVDGDx1bC+zYAAoUz4vEOi85uOgFjHBfBjWE5GQL18g0J4xcYIqHUg1nW7gRZQ61QoguRsFCWfhQwA5hByrzT7cLjNfi2gqMzMqBkgr6YHO9g7AsUsHMPTyrgVoJZaG0+NgGbKGBw+IRfZTcqUCn+ITYsSgXxrEW/TqB7ZTcq2GiRUSwebrB6BfI2qAJkqGXU4mL84m5oXgbyhsyEbKdf7zYdsqFA0dbknTtD5cB34rnXtY2uBUhiv/KRpwMWUctCi9BIjC30SQ9a3I8DsDRcT48El6JUOFkYoO7DBWaE05fhknb1i+e5ftV6wUunwC3u1KGGV7pTl4hrBSPl2+ioQHrSQD9fO2o+4GCBCYeEwT0RvWDcARKsgd6GqQFVlyvP/gWaSfQGOanslwKAEMwAAAABJRU5ErkJggg=="/>
	<div class="contact-info">
		<p>Address: 50 Nanyang Walk, <br>Singapore 639798</p>
		
      </div>
	 


    </section>

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
		

</html>