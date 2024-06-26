<?php
include('../includes/header.php');
if (!is_admin()) {
    redirect('/quickserve/index.php');
}
?>

<div class="container admin-dashboard">
    <h2>Admin Dashboard</h2>
    <ul>
        <li><a href="confirm_order.php" class="button">Konfirmasi Pemesanan</a></li>
        <li><a href="process_order.php" class="button">Pemesanan Sedang Diproses</a></li>
        <li><a href="ready_for_pickup.php" class="button">Pemesanan Siap Diambil</a></li>
        <li><a href="add_restaurant.php" class="button">Tambah Restoran</a></li>
        <li><a href="add_menu.php" class="button">Tambah Menu</a></li>
        <li><a href="view_menus.php" class="button">Edit Menu</a></li>
    </ul>
</div>

<?php
include('../includes/footer.php');
?>
