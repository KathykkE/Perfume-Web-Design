<?php
session_start(); 
if (isset($_SESSION['valid_user'])) {
//if(isset($_GET['username2'])){
    //$cusname = $_GET['username2'];
    $cusname = $_SESSION['valid_user'];

    $db = mysqli_connect("localhost", "root", "", "AromaNook");

    $sql = "SELECT customer_id FROM customer WHERE customer_name = '$cusname';";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_row($result);
    $cusid = number_format((float)$row[0], 0, '.', '');

    $sql = "INSERT INTO confirmed_orders SELECT * FROM orders WHERE customer_id = $cusid;";
    $result = mysqli_query($db, $sql);


     // Fetch order information from confirmed_orders
        // $sql = "SELECT p.product_name, p.product_size, co.quantity FROM confirmed_orders co
        //     INNER JOIN products p ON co.product_id = p.product_id
        //     WHERE co.customer_id = $cusid;";
    $sql = "SELECT p.product_name, p.product_size, co.quantity FROM confirmed_orders co
        INNER JOIN products p ON co.product_id = p.product_id
        WHERE co.customer_id = $cusid AND co.product_id IN (SELECT product_id FROM orders WHERE customer_id = $cusid);";
    $result = mysqli_query($db, $sql);



    // Build the email message
    $message = "Greetings from AromaNook. Your order has been placed and confirmed!\n";
    // Iterate through the order details and add them to the message
    while ($row = mysqli_fetch_assoc($result)) {
            $product_name = $row['product_name'];
            $product_size = $row['product_size'];
            $quantity = $row['quantity'];
            $message .= "Product Name: $product_name\nProduct Size: $product_size\nQuantity: $quantity\n\n";
        }
    // Include the "Cancel Order" link in the message
    $message .= "If you wish to cancel your order, please click the following link: ";
    $message .= "<a href='http://localhost:8000/IE4717/F37-DG06/F37-DG06/cancel_order.php?cusid=$cusid'>Cancel Order</a>";


    $to      = 'f37ee@localhost';
    $subject = 'Order Confirmed!';
    $headers = 'From: f37ee@localhost' . "\r\n" .
        'Reply-To: f37ee@localhost' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    // Set the content type to HTML
    $headers .= "\r\nContent-type: text/html";

    mail($to, $subject, nl2br($message), $headers, '-ff37ee@localhost');

    $sql = "DELETE FROM orders WHERE customer_id = $cusid;";
    $result = mysqli_query($db, $sql);


    echo '<script>
    alert("Order confirmed! An confirmed email will be sent to your email in serveral minutes. You can continue shopping.");
    window.location.href = "shop.php";
    </script>';
}
?>
