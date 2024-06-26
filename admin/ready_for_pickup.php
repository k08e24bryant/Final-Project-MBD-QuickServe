<?php
include('../includes/header.php');
if (!is_admin()) {
    redirect('/quickserve/index.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST['order_id'];
    $sql = "UPDATE Orders SET Status='Ready for Pickup' WHERE OrderID='$order_id'";
    if ($conn->query($sql) === TRUE) {
        echo "<p class='container'>Order is now ready for pickup.</p>";
    } else {
        echo "<p class='container'>Error: " . $conn->error . "</p>";
    }
}

$sql = "SELECT Orders.OrderID, Orders.TotalPrice, Orders.OrderTime, Users.Username, Restaurants.Name as RestaurantName
        FROM Orders
        JOIN Users ON Orders.UserID = Users.UserID
        JOIN Restaurants ON Orders.RestaurantID = Restaurants.RestaurantID
        WHERE Orders.Status='Processing'";
$result = $conn->query($sql);
?>
<div class="container ready-for-pickup-container">
    <h2>Orders Ready for Pickup</h2>
    <ul>
        <?php while($row = $result->fetch_assoc()): ?>
            <li>
                <p><strong>Order ID:</strong> <?php echo $row['OrderID']; ?></p>
                <p><strong>User:</strong> <?php echo $row['Username']; ?></p>
                <p><strong>Restaurant:</strong> <?php echo $row['RestaurantName']; ?></p>
                <p><strong>Total Price:</strong> <?php echo $row['TotalPrice']; ?></p>
                <p><strong>Order Time:</strong> <?php echo $row['OrderTime']; ?></p>
                <form action="" method="post">
                    <input type="hidden" name="order_id" value="<?php echo $row['OrderID']; ?>">
                    <button type="submit" class="button">Ready for Pickup</button>
                </form>
            </li>
        <?php endwhile; ?>
    </ul>
</div>
<?php
include('../includes/footer.php');
?>
