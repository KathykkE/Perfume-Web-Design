<?php
session_start();
if (isset($_SESSION['valid_user'])){

	if (!isset($_SESSION['cart'])){
		$_SESSION['cart'] = array();
	};

	$_Values_GET = array_values($_GET);

	for ($i=0; $i < count($_Values_GET); $i=$i+1){
	array_push($_SESSION['cart'], $_Values_GET[$i]);}

	$_Values_Cart = array_values($_SESSION['cart']);

	@ $db = mysqli_connect("localhost", "root", "", "AromaNook");

	$cusname = $_SESSION['valid_user'];
	$sql1 = "SELECT customer_id FROM customer WHERE customer_name = '$cusname';";
	$result = mysqli_query($db, $sql1);
	$row = mysqli_fetch_row($result);
	$cusid = number_format((float)$row[0], 0, '.', '');


	for ($i=0; $i< count($_Values_GET); $i=$i+2 ) {
		$pid = $_Values_GET[$i]+1;
		$orderqty = $_Values_GET[$i+1];
		$sql = "INSERT INTO orders VALUES ($cusid, $pid,  $orderqty);";
		mysqli_query($db, $sql);
	}

	$pid = $_Values_GET[0]+1;
	$orderqty = $_Values_GET[1];
	$sql = "SELECT product_avaliable FROM products WHERE product_id = $pid;";
	$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_row($result);
	$remain = number_format((float)$row[0], 0, '.', '');
	$newquantity = $remain - $orderqty;

	$sql = "UPDATE products SET product_avaliable = $newquantity WHERE product_id = $pid;";
	$result = mysqli_query($db, $sql);

	header("Location: shop.php");

}
else {
	echo "<script>alert('Cannot add products. Please log in first.');parent.location.href='account.php';</script>";
}







 ?>
