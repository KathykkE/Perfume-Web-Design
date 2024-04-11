<?php

if(isset($_GET['pid']) && isset($_GET['username'])){
$productid = $_GET['pid'];
$cusname = $_GET['username'];

@ $db = mysqli_connect("localhost", "root", "", "AromaNook");

$sql = "SELECT customer_id FROM customer WHERE customer_name = '$cusname';";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_row($result);
$cusid = number_format((float)$row[0], 0, '.', '');

$sql = "SELECT quantity FROM orders WHERE customer_id = $cusid AND product_id = $productid;";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_row($result);
$putback = number_format((float)$row[0], 0, '.', '');

$sql = "SELECT product_avaliable FROM products WHERE product_id = $productid;";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_row($result);
$remain = number_format((float)$row[0], 0, '.', '');
$newquantity = $remain + $putback;


$sql = "UPDATE products SET product_avaliable = $newquantity WHERE product_id = $productid;";
$result = mysqli_query($db, $sql);


$sql = "DELETE FROM orders WHERE customer_id = $cusid AND product_id = $productid;";
$result = mysqli_query($db, $sql);



header("Location: cart.php");


}
