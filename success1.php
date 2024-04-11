<!doctype html>
<html lang="en">
<head>
  <title>Dress House</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css" >
  <link rel="icon" href="logo.jpg">
  <script type="text/javascript" src="MaxRemain.js"></script>
</head>
<body>
  <div id="wrapper">
    <div id="navigation">
      <ul>
      <li><a href="members_only.php">Shopping Cart</a></li>
      <li><a href="category.php">Product Catalog</a>
       <ul>
         <li><a href="OP.php">One Piece</a></li>
         <li><a href="JSK.php">Jumper Skirt</a></li>
         <li><a href="SK.php">Skirt</a></li>
       </ul></li>
      <li><a href="account.php">Account</a></li>
     </ul>
    <!-- <div id="search-div">
      <form action="search.php" method="get">
        <table><tr>
        <td valign="top"><input name="searchterm" type="text" style="height: 15px;" placeholder="Search">
        <td valign="middle"><input type="image" name="search" value="" src="search.png" style="height: 30px;">
        </tr></table>
      </form>
    </div> -->
    </div>
    <header>
      <a href="homepage.html"><img src="logo.jpg" alt="LOGO" width = "300" height="100" /></a>
    </header>
    <div id="divide">
    </div>
    <div id="thank">
      <p>You have placed an order successfully!<br>
        A confirmation email will send you later.</p>
      <p class="shopping" style="text-align: center;"><a href="category.php" >Click here to continue shopping</a></p>
      <?php
      session_start();
      require "mail_patch.php";
      use function mail_patch\mail;
      $cusname = $_SESSION['valid_user'];

      @ $db = mysqli_connect("localhost", "root", "", "DressHouse");

      $sql = "SELECT customer_id FROM customer WHERE customer_name='$cusname';";
      $result = mysqli_query($db, $sql);
      $row = mysqli_fetch_row($result);
      $cust_id = number_format((float)$row[0], 0, '.', '');

      $productid = array();
      $sql = "SELECT product_id, sum(quantity) AS quantity FROM confirmed_orders WHERE customer_id=$cust_id GROUP BY product_id;";
      $result = mysqli_query($db, $sql);
      while($row = mysqli_fetch_row($result)){
        array_push($productid, $row[0], $row[1]);
      }

      $items = array();
      for ($i=0;$i<count($productid);$i=$i+2){
      	@ $db = mysqli_connect("localhost", "root", "", "DressHouse");
      	$sql = "SELECT product_name FROM products WHERE product_id = $productid[$i];";
      	$result = mysqli_query($db, $sql);
      	$name = mysqli_fetch_row($result);
      	array_push($items, $name[0]);
      }
      $colors = array();
      for ($i=0;$i<count($productid);$i=$i+2){
      	@ $db = mysqli_connect("localhost", "root", "", "DressHouse");
      	$sql = "SELECT product_color FROM products WHERE product_id = $productid[$i];";
      	$result = mysqli_query($db, $sql);
      	$color = mysqli_fetch_row($result);
      	array_push($colors, $color[0]);
      }

      $quantity = array();
      for ($i=0;$i<count($productid);$i=$i+2){
      	array_push($quantity, $productid[$i+1]);
      }
      $mes="";
      for ($i=0; $i<count($quantity);$i=$i+1){
      $message = "".$items[$i]." - ".$colors[$i]." : ".$quantity[$i]."" . "\r\n";
      $mes = $mes.$message;
    }
      $sqle = "SELECT customer_email FROM customer WHERE customer_name='$cusname';";
      $resulte = mysqli_query($db, $sqle);
      $email = mysqli_fetch_row($resulte);
      $to      = $email[0];
      $subject = 'Order confirmation';
      $message = 'Dear customer '.$cusname.': '."\r\n\r\n".
                  'Your order has been placed successful! Hope to see you again.' . "\r\n\r\n" .
                  'Your order list:' ."\r\n". $mes ."\r\n";
      $headers = 'From: DressHouse' . "\r\n" .
          'Reply-To: DressHouse' . "\r\n" .
          'X-Mailer: PHP/' . phpversion();

      mail($to, $subject, $message, $headers,'DressHouse');
?>



















    </div>
    <div id="foot">
      <table><tr>
        <td><a href="homepage.html"><img src="logo.jpg"></a></td>
        <td valign="top"><p class="foottext"><strong>Contact us</strong><br>90871451<br>Products & Orders: 24 hours a day, 7 days a week<br>Company Info & Enquiries: 10:00 - 19:00, Monday - Friday
          </p></td>
        <td valign="top"><p class="foottext"><strong>Policies</strong><br>All rights reserved.<br>Unauthorized duplication is a violation of applicable laws.
          </p></td></tr>
      </table>
    </div>
    <footer>
      <small><i>Copyright &copy; 2022 The Dress House<br>
        <a href="e200225@e.ntu.edu.sg">E200225@e.ntu.edu.sg</a></i></small>
    </footer>
    </div>
    </body>
    </html>
