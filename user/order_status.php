<?php
include('../includes/header.php');
if (!is_logged_in()) {
    redirect('/quickserve/user/login.php');
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM Orders WHERE UserID='$user_id'";
$result = $conn->query($sql);
?>
<div class="order-status">
    <h2>My Orders</h2>
    <ul>
        <?php while($row = $result->fetch_assoc()): ?>
            <li>
                <h3>Order ID: <?php echo $row['OrderID']; ?></h3>
                <p>Status: <?php echo $row['Status']; ?></p>
                <p>Total Price: <?php echo $row['TotalPrice']; ?></p>
                <a href="receipt.php?order_id=<?php echo $row['OrderID']; ?>">View Receipt</a>
            </li>
        <?php endwhile; ?>
    </ul>
</div>
<?php
include('../includes/footer.php');
?>
