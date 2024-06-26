<?php
session_start();
include('../includes/db.php');
include('../includes/functions.php');

if (!is_logged_in()) {
    redirect('/quickserve/user/login.php');
}

$user_id = $_SESSION['user_id'];
$menu_id = $_POST['menu_id'];
$quantity = $_POST['quantity'];

$sql = "SELECT Price FROM Menus WHERE MenuID='$menu_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$price = $row['Price'];
$total_price = $price * $quantity;

$order_id = uniqid();
$sql = "INSERT INTO Orders (OrderID, UserID, RestaurantID, TotalPrice, Status, OrderTime) VALUES ('$order_id', '$user_id', '$restaurant_id', '$total_price', 'Pending', NOW())";
$conn->query($sql);

$order_detail_id = uniqid();
$sql = "INSERT INTO OrderDetails (OrderDetailID, OrderID, MenuID, Quantity, Price) VALUES ('$order_detail_id', '$order_id', '$menu_id', '$quantity', '$total_price')";
$conn->query($sql);

redirect('/quickserve/user/order_status.php');
?>
