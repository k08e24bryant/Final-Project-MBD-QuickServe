<?php
include('../includes/header.php');
if (!is_admin()) {
    redirect('/quickserve/index.php');
}

// Ambil daftar menu dari database
$sql = "SELECT * FROM Menus";
$result = $conn->query($sql);
?>

<div class="container view-menus-container">
    <h2>View Menus</h2>
    <ul>
        <?php while($menu = $result->fetch_assoc()): ?>
            <li>
                <img src="/quickserve/<?php echo $menu['Image']; ?>" alt="<?php echo $menu['Name']; ?>" width="100">
                <h3><?php echo $menu['Name']; ?></h3>
                <p><?php echo $menu['Description']; ?></p>
                <p><?php echo $menu['Price']; ?></p>
                <a href="edit_menu.php?id=<?php echo $menu['MenuID']; ?>" class="button">Edit</a>
            </li>
        <?php endwhile; ?>
    </ul>
</div>
<?php
include('../includes/footer.php');
?>
