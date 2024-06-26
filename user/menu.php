<?php
include('../includes/header.php');
$restaurant_id = $_GET['restaurant_id'];
$sql = "SELECT * FROM Menus WHERE RestaurantID='$restaurant_id'";
$result = $conn->query($sql);
?>
<div class="container restaurant-menu">
    <h2>Menu</h2>
    <ul>
        <?php while($row = $result->fetch_assoc()): ?>
            <li class="<?php echo $row['Available'] ? '' : 'unavailable'; ?>">
                <img src="/quickserve/<?php echo $row['Image']; ?>" alt="<?php echo $row['Name']; ?>" class="menu-image">
                <h3><?php echo $row['Name']; ?></h3>
                <p><?php echo $row['Description']; ?></p>
                <p><?php echo $row['Price']; ?></p>
                <?php if ($row['Available']): ?>
                    <form action="order_process.php" method="post">
                        <input type="hidden" name="menu_id" value="<?php echo $row['MenuID']; ?>">
                        <input type="number" name="quantity" value="1" min="1" required>
                        <button type="submit" class="button">Order</button>
                    </form>
                <?php else: ?>
                    <p class="unavailable-text">Currently unavailable</p>
                <?php endif; ?>
            </li>
        <?php endwhile; ?>
    </ul>
</div>
<?php
include('../includes/footer.php');
?>
