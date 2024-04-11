<?php
// Get the customer ID from the URL
$cusid = $_GET['cusid'];

// Connect to the database
$db = mysqli_connect("localhost", "root", "", "AromaNook");

// Remove the order from the 'orders' table
$sql = "DELETE FROM confirmed_orders WHERE customer_id = $cusid";
mysqli_query($db, $sql);

// Redirect the user
echo '<script>
alert("Order canceled successfully! You can continue shopping.");
window.location.href = "shop.php";
</script>';
?>