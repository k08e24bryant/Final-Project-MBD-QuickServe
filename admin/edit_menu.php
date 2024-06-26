<?php
include('../includes/header.php');
if (!is_admin()) {
    redirect('/quickserve/index.php');
}

$menu_id = $_GET['id'];


$sql = "SELECT * FROM Menus WHERE MenuID='$menu_id'";
$result = $conn->query($sql);
$menu = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $available = isset($_POST['available']) ? 1 : 0;
    $image = $menu['Image'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $image = '../uploads/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
        $image = 'uploads/' . basename($_FILES['image']['name']); // Simpan path relatif ke dalam database
    }

    $sql = "UPDATE Menus SET Name='$name', Description='$description', Price='$price', Available='$available', Image='$image' WHERE MenuID='$menu_id'";
    if ($conn->query($sql) === TRUE) {
        echo "<p class='container'>Menu item updated successfully.</p>";
    } else {
        echo "<p class='container'>Error: " . $conn->error . "</p>";
    }
}

?>

<div class="container edit-menu-container">
    <h2>Edit Menu Item</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="name">Menu Item Name</label>
        <input type="text" id="name" name="name" value="<?php echo $menu['Name']; ?>" required>
        <label for="description">Description</label>
        <textarea id="description" name="description" required><?php echo $menu['Description']; ?></textarea>
        <label for="price">Price</label>
        <input type="number" step="0.01" id="price" name="price" value="<?php echo $menu['Price']; ?>" required>
        <label for="available">Available</label>
        <input type="checkbox" id="available" name="available" <?php echo $menu['Available'] ? 'checked' : ''; ?>>
        <label for="image">Image</label>
        <input type="file" id="image" name="image">
        <img src="/quickserve/<?php echo $menu['Image']; ?>" alt="<?php echo $menu['Name']; ?>" width="100">
        <button type="submit" class="button">Update Menu Item</button>
    </form>
</div>
<?php
include('../includes/footer.php');
?>
