<?php
include('../includes/header.php');
if (!is_admin()) {
    redirect('/quickserve/index.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $restaurant_id = $_POST['restaurant_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $available = isset($_POST['available']) ? 1 : 0;
    $image = '';

    // Periksa apakah direktori uploads ada, jika tidak buat direktori tersebut
    $upload_dir = '../uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $image = 'uploads/' . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $image)) {
            // Path relatif yang disimpan di database
            $image = 'uploads/' . basename($_FILES['image']['name']);
        } else {
            echo "<p class='container'>Error: Failed to upload image.</p>";
        }
    }
    

    // Tidak menyertakan MenuID karena seharusnya auto increment
    $sql = "INSERT INTO Menus (RestaurantID, Name, Description, Price, Available, Image) VALUES ('$restaurant_id', '$name', '$description', '$price', '$available', '$image')";

    if ($conn->query($sql) === TRUE) {
        echo "<p class='container'>Menu item added successfully.</p>";
    } else {
        echo "<p class='container'>Error: " . $conn->error . "</p>";
    }
}

// Ambil daftar restoran untuk dropdown
$restaurants_sql = "SELECT RestaurantID, Name FROM Restaurants";
$restaurants_result = $conn->query($restaurants_sql);
?>
<div class="container add-menu-container">
    <h2>Add Menu Item</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="restaurant_id">Restaurant</label>
        <select id="restaurant_id" name="restaurant_id" required>
            <option value="">Select Restaurant</option>
            <?php while($restaurant = $restaurants_result->fetch_assoc()): ?>
                <option value="<?php echo $restaurant['RestaurantID']; ?>"><?php echo $restaurant['Name']; ?></option>
            <?php endwhile; ?>
        </select>
        <label for="name">Menu Item Name</label>
        <input type="text" id="name" name="name" required>
        <label for="description">Description</label>
        <textarea id="description" name="description" required></textarea>
        <label for="price">Price</label>
        <input type="number" step="0.01" id="price" name="price" required>
        <label for="available">Available</label>
        <input type="checkbox" id="available" name="available">
        <label for="image">Image</label>
        <input type="file" id="image" name="image">
        <button type="submit" class="button">Add Menu Item</button>
    </form>
</div>
<?php
include('../includes/footer.php');
?>
