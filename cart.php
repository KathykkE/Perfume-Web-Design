<?php include"deletecart.php"?>
<?php include"minus.php"?>
<?php include"add.php"?>
<?php  //cart.php
session_start();
if (!isset($_SESSION['cart'])){
	$_SESSION['cart'] = array();
}
if (isset($_GET['empty'])) {
	unset($_SESSION['cart']);
	header('location: ' . $_SERVER['PHP_SELF']);
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Aroma Nook</title>
    <meta charset="UTF-8">
    <meta name="viewport" content=" width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/shop.css">
	
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
	
<style>
/* CSS for centering and adding padding */
.cart-container {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 50px 20px;
    }

.cart-table {
        text-align: center;
        border-collapse: collapse;
    }

.cart-table th {
        padding: 20px;
    }
	
.cart-table td {
        padding: 20px;
		font-family:Poppins;
    }
	
.cart-button {
            background: #fef6e4;
            color: #172C66;
            font-family: Rufina;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
			box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
			font-weight: 480;
			font-size:15px;
		}

.cart-button:hover{
			background: white;
			color:#c8815f;
		}
</style>

	<!--Shopping Cart-->
<div class="right-box">
<div class="spacer"></div>
<div class="subtitle-text">Shopping Cart </div>
<div class="cart-container">
	
	<div class="spacer"></div><br>
	
<?php
$items = array();
$prices = array();
$product_img = array();
$sizes = array();

@ $db = mysqli_connect("localhost", "root", "", "AromaNook");

for ($i = 0; $i < 20; $i++) {
    $sql = "SELECT product_name, product_price, product_pic, product_size FROM products WHERE product_id = " . ($i + 1);
    $result = mysqli_query($db, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            array_push($items, $row['product_name']);
            array_push($prices, $row['product_price']);
            array_push($product_img, $row['product_pic']);
            array_push($sizes, $row['product_size']);
        }
    }
}
?>

<?php
	@ $db = mysqli_connect("localhost", "root", "", "AromaNook");

	$cusname = $_SESSION['valid_user'];
	$sql = "SELECT customer_id FROM customer WHERE customer_name = '$cusname';";
	$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_row($result);
	$cusid = number_format((float)$row[0], 0, '.', '');

	$sql = "SELECT product_id, sum(quantity) AS quantity FROM orders WHERE customer_id = $cusid GROUP BY product_id;";
	$result = mysqli_query($db, $sql);
	$i=0;
		while ($row = mysqli_fetch_assoc($result)){
			$temp[] = array_values($row);
			$_Values_Orders[] = $temp[$i][0];
			$_Values_Orders[] = $temp[$i][1];
			$i++;
		};

?>


<?php
$total = 0;
$username = $_SESSION['valid_user'];

if (isset($_Values_Orders)) {
    echo "<table class='cart-table'>
    <thead>
    <tr style='font-size:20px; align=center'>
        <th>Product</th>
		<th> </th>
        <th>Size</th> 
        <th colspan='3'>Quantity</th>
        <th>Price</th>
        <th>Remove</th>
    </tr>
    </thead>
    <tbody>";

    for ($i = 0; $i < (count($_Values_Orders)); $i = $i + 2) {
        echo "<tr>";
        echo "<td>" . $items[((int)$_Values_Orders[$i] - 1)] . "</td>";
		echo "<td><img src=" . $product_img[((int)$_Values_Orders[$i] - 1)] . " style='width: 120px;'></td>";
        echo "<td>" . $sizes[((int)$_Values_Orders[$i] - 1)] . "</td>"; 
        
        echo "<td><form action='minus.php' method='get'><input type='hidden' name='pid' value=$_Values_Orders[$i]><input type='hidden' name='username' value=$username><input type='submit' value='-' style='border-radius: 20%;background:#FFF2F8;border:none;width: 30px;height:30px;font-size: 100%;text-align:middle;color:#931D4F;'></form></td>";
        echo "<td style='padding-left: 5px;padding-right:5px;'>" . ((int)$_Values_Orders[$i + 1]) . " </td>";
        echo "<td><form action='add.php' method='get'><input type='hidden' name='pid' value=$_Values_Orders[$i]><input type='hidden' name='username' value=$username><input type='submit' value='+' style='border-radius: 20%;background:#FFF2F8;border:none;width: 30px;height:30px;font-size: 100%;text-align:middle;color:#931D4F;'></form></td>";
        echo "<td align='right'>$";
        echo number_format(((int)$_Values_Orders[$i + 1]) * $prices[((int)$_Values_Orders[$i] - 1)], 2) . "</td>";
        echo "<td>";
        echo "<form action='deletecart.php' method='get'><input type='hidden' name='pid' value=$_Values_Orders[$i]><input type='hidden' name='username' value=$username><input type='submit' value='Remove' style='background:#FFF2F8;border:2px solid #f582ae;height:40px; width:70px; font-size: 90%;border-radius:10%;font-family: Poppins, cursive;text-align:middle;color:#f582ae;'></form></td>";
        echo "</tr>";
        $total = $total + ((int)$_Values_Orders[$i + 1]) * $prices[((int)$_Values_Orders[$i] - 1)];
    }
    echo "	</tbody>
    <tfoot>
		<tr>
			<th colspan='2'>
				<a href='shop.php' class='cart-button' style='align: left;'>Continue Shopping</a>
			</th>
			<th><th><th>
			<th style='font-size:20px; align=right;'>Total:&nbsp</th><br>
			<th style='font-size:20px; align=right;'>$&nbsp$total.00
			</th>
		</tr>
    
		<tr>
			<td colspan='7' style='text-align: right;'><br>
				<form action='confirmorder.php'>
					<input class='button' type='hidden' name='username2' value=$username>
					<input class='button' style='font-weight: 500; padding: 12px 22px; font-size:16px;' type='submit' value='Confirm Order'>
				</form>
			</td>
		</tr></tfoot></table>";
} else {
    echo "<div class='subtitle-text'>Your shopping cart is empty.&nbsp;&nbsp;  </div>";
    echo "<a href='shop.php' class='cart-button' style='font-size:17px; display: block; text-align: center;'>Start Shopping</a>";
}
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

