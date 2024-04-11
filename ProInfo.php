<?php

function GetStock($id) {

    @ $db = mysqli_connect("localhost", "root", "", "AromaNook");

    $sql = "SELECT product_avaliable FROM products WHERE product_id = $id;";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_row($result);
   $stock = number_format((float)$row[0], 0, '.', '');

    if ($stock == 0) {
        // If stock is 0, return "Sold out" in red text
        return '<span style="color: red;">Sold out</span>';
    } else {
        // Otherwise, return the stock value
        return $stock;
    }
}

function GetPrice($id) {

    @ $db = mysqli_connect("localhost", "root", "", "AromaNook");

    $sql = "SELECT product_price FROM products WHERE product_id = $id;";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_row($result);
    echo number_format((float)$row[0], 0, '.', '');
}

function GetProName($id) {

    @ $db = mysqli_connect("localhost", "root", "", "AromaNook");

    $sql = "SELECT product_name FROM products WHERE product_id = $id;";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_row($result);
    echo $row[0];
}

function GetSize($id) {

    @ $db = mysqli_connect("localhost", "root", "", "AromaNook");

    $sql = "SELECT product_size FROM products WHERE product_id = $id;";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_row($result);
    echo $row[0];
}

?>