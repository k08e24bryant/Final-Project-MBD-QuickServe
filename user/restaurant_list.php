<?php
include('../includes/header.php');
$sql = "SELECT * FROM Restaurants";
$result = $conn->query($sql);
?>
<div class="container restaurant-list">
    <h2>Restaurants</h2>
    <ul>
        <?php while($row = $result->fetch_assoc()): ?>
            <li class="restaurant-item">
                <a href="menu.php?restaurant_id=<?php echo $row['RestaurantID']; ?>">
                    <div class="restaurant-card">
                        <h3><?php echo $row['Name']; ?></h3>
                        <p><?php echo $row['Address']; ?></p>
                        <p><?php echo $row['PhoneNumber']; ?></p>
                    </div>
                </a>
            </li>
        <?php endwhile; ?>
    </ul>
</div>
<?php
include('../includes/footer.php');
?>
