<?php
if (isset($_GET['pid']) && isset($_GET['username'])) {
    $productid = (int)$_GET['pid'];
    $cusname = $_GET['username'];

    // Validate and sanitize input if necessary

    $db = mysqli_connect("localhost", "root", "", "AromaNook");
    if (!$db) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Perform the necessary queries, using prepared statements for safety
    $sql = "SELECT customer_id FROM customer WHERE customer_name = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "s", $cusname);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $cusid);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    $sql = "SELECT quantity FROM orders WHERE customer_id = ? AND product_id = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $cusid, $productid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $qty);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    $quantity = $qty - 1;
    if ($quantity > 0) {
        $sql = "UPDATE orders SET quantity = ? WHERE product_id = ?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "ii", $quantity, $productid);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        $sql = "SELECT product_avaliable FROM products WHERE product_id = ?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "i", $productid);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $remain);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        $newquantity = $remain + 1;

        $sql = "UPDATE products SET product_avaliable = ? WHERE product_id = ?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "ii", $newquantity, $productid);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    mysqli_close($db);
    header("Location: cart.php");
} else {
    // Handle missing parameters or invalid input
}
?>

