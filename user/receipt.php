<?php
include('../includes/header.php');
if (!is_logged_in()) {
    redirect('/quickserve/user/login.php');
}

$order_id = $_GET['order_id'];
$sql = "SELECT Orders.OrderID, Orders.TotalPrice, Orders.Status, Orders.OrderTime, Restaurants.Name as RestaurantName, Users.Username
        FROM Orders
        JOIN Restaurants ON Orders.RestaurantID = Restaurants.RestaurantID
        JOIN Users ON Orders.UserID = Users.UserID
        WHERE Orders.OrderID='$order_id'";
$order_result = $conn->query($sql);
$order = $order_result->fetch_assoc();

$sql = "SELECT Menus.Name as MenuName, OrderDetails.Quantity, OrderDetails.Price
        FROM OrderDetails
        JOIN Menus ON OrderDetails.MenuID = Menus.MenuID
        WHERE OrderDetails.OrderID='$order_id'";
$order_details_result = $conn->query($sql);
?>
<div class="receipt">
    <h2>Receipt</h2>
    <h3>Order ID: <?php echo $order['OrderID']; ?></h3>
    <p>Username: <?php echo $order['Username']; ?></p>
    <p>Restaurant: <?php echo $order['RestaurantName']; ?></p>
    <p>Order Time: <?php echo $order['OrderTime']; ?></p>
    <p>Status: <?php echo $order['Status']; ?></p>
    <table>
        <thead>
            <tr>
                <th>Menu Item</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $order_details_result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['MenuName']; ?></td>
                    <td><?php echo $row['Quantity']; ?></td>
                    <td><?php echo $row['Price']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <h3>Total Price: <?php echo $order['TotalPrice']; ?></h3>
</div>
<?php
include('../includes/footer.php');
?>
